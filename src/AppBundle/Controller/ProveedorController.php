<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Proveedor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Proveedor controller.
 *
 * @Route("proveedor")
 */
class ProveedorController extends Controller
{
    /**
     * Lists all proveedor entities.
     *
     * @Route("/", name="proveedor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proveedors = $em->getRepository('AppBundle:Proveedor')->findAll();

        return $this->render('proveedor/index.html.twig', array(
            'proveedors' => $proveedors,
        ));
    }

    /**
     * Creates a new proveedor entity.
     *
     * @Route("/new", name="proveedor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $proveedor = new Proveedor();
        $form = $this->createForm('AppBundle\Form\ProveedorType', $proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proveedor);
            $em->flush();

            return $this->redirectToRoute('proveedor_show', array('id' => $proveedor->getId()));
        }

        return $this->render('proveedor/new.html.twig', array(
            'proveedor' => $proveedor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proveedor entity.
     *
     * @Route("/{id}", name="proveedor_show")
     * @Method("GET")
     */
    public function showAction(Proveedor $proveedor)
    {
        $deleteForm = $this->createDeleteForm($proveedor);

        return $this->render('proveedor/show.html.twig', array(
            'proveedor' => $proveedor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proveedor entity.
     *
     * @Route("/{id}/edit", name="proveedor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Proveedor $proveedor)
    {
        $deleteForm = $this->createDeleteForm($proveedor);
        $editForm = $this->createForm('AppBundle\Form\ProveedorType', $proveedor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proveedor_edit', array('id' => $proveedor->getId()));
        }

        return $this->render('proveedor/edit.html.twig', array(
            'proveedor' => $proveedor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proveedor entity.
     *
     * @Route("/{id}", name="proveedor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Proveedor $proveedor)
    {
        $form = $this->createDeleteForm($proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proveedor);
            $em->flush();
        }

        return $this->redirectToRoute('proveedor_index');
    }

    /**
     * Creates a form to delete a proveedor entity.
     *
     * @param Proveedor $proveedor The proveedor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proveedor $proveedor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proveedor_delete', array('id' => $proveedor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * busca todos los proveedores que vendan ciertos productos
     *
     * @Route("/ajax", name="buscar_proveedores")
     * @return JsonResponse|Response
     */
    public function buscarProveedores(Request $request){
        if ($request->isXmlHttpRequest()) {
            if ($request->request->get('pedidos')) {

                $pedidos = $request->request->get('pedidos');
                $em = $this->getDoctrine()->getManager();

                $proveedores = $em->getRepository('AppBundle:Proveedor')->findAll();

                $arrayProductos = [];
                $arrayProveedores = [];
                $i = 0;
                $j = 0;

                foreach($pedidos as $pedido){
                    $dqlProductos = "
                    SELECT p.id FROM AppBundle:Producto p
                        INNER JOIN AppBundle:DetallePedido dp WITH dp.idProducto = p.id
                        WHERE dp.idPedido = :idPedido
                    ";
                    $query = $em->createQuery($dqlProductos)
                        ->setParameter('idPedido', $pedido);
                    $productos = $query->getResult();

                    foreach($productos as $producto){
                        if(!in_array($producto, $arrayProductos, true)){
                            $arrayProductos[$i] = $producto;
                            $i++;
                        }
                    }
                }

                foreach($proveedores as $proveedor){
                    $index = 0;
                    $vende = true;
                    while($index < count($arrayProductos) AND $vende){
                        $dqlPrecio = "
                        SELECT p.precio FROM AppBundle:Precio p
                        WHERE p.idProveedor = :proveedor AND
                        p.fechaUltimaActualizacion IN (SELECT MAX(p2.fechaUltimaActualizacion) FROM AppBundle:Precio p2
                        WHERE p2.idProducto = :producto GROUP BY p2.idProducto)
                        ";

                        $query = $em->createQuery($dqlPrecio)
                            ->setParameter('producto', $arrayProductos[$index])
                            ->setParameter('proveedor', $proveedor);

                        $precio = $query->getResult();
                        if(count($precio) == 0){
                            $vende = false;
                        }
                        $index++;
                    }
                    if($vende){
                        $arrayProveedores[$j] = $proveedor;
                        $j++;
                    }
                }

                return new JsonResponse($arrayProveedores);
            }
        }
        return $this->redirectToRoute('ordencompra_new');
    }
}
