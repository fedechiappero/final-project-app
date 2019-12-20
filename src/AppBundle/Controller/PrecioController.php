<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Precio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Precio controller.
 *
 * @Route("precio")
 */
class PrecioController extends Controller
{
    /**
     * Lists all precio entities.
     *
     * @Route("/", name="precio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $precios = $em->getRepository('AppBundle:Precio')->findAll();

        return $this->render('precio/index.html.twig', array(
            'precios' => $precios,
        ));
    }

    /**
     * Creates a new precio entity.
     *
     * @Route("/new", name="precio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $precio = new Precio();
        $form = $this->createForm('AppBundle\Form\PrecioType', $precio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($precio);
            $em->flush();

            return $this->redirectToRoute('precio_show', array('id' => $precio->getId()));
        }

        return $this->render('precio/new.html.twig', array(
            'precio' => $precio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a precio entity.
     *
     * @Route("/{id}", name="precio_show")
     * @Method("GET")
     */
    public function showAction(Precio $precio)
    {
        $deleteForm = $this->createDeleteForm($precio);

        return $this->render('precio/show.html.twig', array(
            'precio' => $precio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing precio entity.
     *
     * @Route("/{id}/edit", name="precio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Precio $precio)
    {
        $deleteForm = $this->createDeleteForm($precio);
        $editForm = $this->createForm('AppBundle\Form\PrecioType', $precio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('precio_edit', array('id' => $precio->getId()));
        }

        return $this->render('precio/edit.html.twig', array(
            'precio' => $precio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a precio entity.
     *
     * @Route("/{id}", name="precio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Precio $precio)
    {
        $form = $this->createDeleteForm($precio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($precio);
            $em->flush();
        }

        return $this->redirectToRoute('precio_index');
    }

    /**
     * Creates a form to delete a precio entity.
     *
     * @param Precio $precio The precio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Precio $precio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('precio_delete', array('id' => $precio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * busca los precios de un proveedor para productos de un pedido
     *
     * @Route("/ajax", name="buscar_precios")
     * @return JsonResponse|Response
     */
    public function buscarPrecios(Request $request){
        if ($request->isXmlHttpRequest()) {
            if ($request->request->get('pedidos')) {

                $pedidos = $request->request->get('pedidos');
                $proveedor = $request->request->get('idProveedor');
                $em = $this->getDoctrine()->getManager();

                $arrayPrecios = [];
                $arrayProductos = [];
                $i = 0;

                foreach($pedidos as $pedido){
                    $dqlProductos = "
                        SELECT IDENTITY(dp.idProducto) FROM AppBundle:DetallePedido dp
                        WHERE dp.idPedido = :pedido
                    ";
                    $query = $em->createQuery($dqlProductos)
                        ->setParameter('pedido', $pedido);
                    $productos = $query->getResult();

                    foreach($productos as $producto){
                        if(!in_array($producto, $arrayProductos, true)){
                            $arrayProductos[$i] = $producto;
                            $i++;
                        }
                    }
                }

                foreach($arrayProductos as $producto){
                    $dqlPrecios= "
                        SELECT p.precio FROM AppBundle:Precio p
                        WHERE p.idProducto = :idproducto AND p.idProveedor = :idproveedor AND
                        p.fechaUltimaActualizacion IN (SELECT MAX(p2.fechaUltimaActualizacion) FROM AppBundle:Precio p2
                                                           GROUP BY p2.idProducto, p2.idProveedor)
                    ";
                    $query = $em->createQuery($dqlPrecios)
                        ->setParameter('idproducto', $producto)
                        ->setParameter('idproveedor', $proveedor);
                    $precios = $query->getResult();
                    $arrayPrecios[] = [$precios[0], $producto];

                    /*foreach($precios as $precio){
                        if(!in_array($precio, $arrayPrecios, true)){
                            $dql = "
                                SELECT p.id FROM AppBundle:Precio p
                                WHERE p.id = :precio
                            ";

                            $query = $em->createQuery($dql)
                                ->setParameter('precio', $precio);

                            $res = $query->getResult();
                            //$pr = $em->getRepository('AppBundle:Precio')->find($precio);
                            $arrayPrecios[$i] = $res[0];
                            $i++;
                        }
                    }*/
                }

                return new JsonResponse($arrayPrecios);
            }
        }
        return $this->redirectToRoute('ordencompra_new');
    }
}
