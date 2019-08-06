<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetallePedido;
use AppBundle\Entity\Pedido;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Pedido controller.
 *
 * @Route("pedido")
 */
class PedidoController extends Controller
{
    /**
     * Lists all pedido entities.
     *
     * @Route("/", name="pedido_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("
            SELECT p.id, p.numero, p.fecha, p.necesarioParaFecha, o.nombre AS obraNombre, c.razonSocial, e.id AS estadoId, e.nombre AS estadoNombre FROM AppBundle:Pedido p
            INNER JOIN AppBundle:ContratistaObra co WITH p.idContratistaObra = co.id
            INNER JOIN AppBundle:Obra o WITH co.idObra = o.id
            INNER JOIN AppBundle:ContratistaRubro cr WITH co.idContratistaRubro = cr.id
            INNER JOIN AppBundle:Contratista c WITH cr.idContratista = c.id
            INNER JOIN AppBundle:EstadoPedido ep WITH ep.idPedido = p.id
            INNER JOIN AppBundle:Estado e WITH ep.idEstado = e.id
            WHERE ep.fecha IN (SELECT MAX(ep2.fecha) FROM AppBundle:EstadoPedido ep2
                                GROUP BY ep2.idPedido)
        ");

        $pedidos = $query->getResult();

        return $this->render('pedido/index.html.twig', array(
            'pedidos' => $pedidos,
        ));
    }

    /**
     * Creates a new pedido entity.
     *
     * @Route("/new", name="pedido_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {//guardo datos

            //temporary data
            $obra = $em
                ->getRepository('AppBundle:Obra')
                ->find($request->request
                    ->get('idobra'));

            //temporary data
            $contratistaRubro = $em
                ->getRepository('AppBundle:ContratistaRubro')
                ->find($request->request
                    ->get('contratistaobraselected'));

            $contratistaObra = $em
                ->getRepository('AppBundle:ContratistaObra')
                ->findOneBy(array(
                    'idObra'=>$obra->getId(),
                    'idContratistaRubro'=>$contratistaRubro->getId()));

            $contratistaObra = $em->getRepository('AppBundle:ContratistaObra')->find($contratistaObra->getId());

            $numero = $request->request->get('numero');
            $fecha = new \DateTime('now');
            $necesarioparafecha = new \DateTime($request->request->get('necesarioparafecha'));

            $pedido = new Pedido();
            $pedido->setIdContratistaObra($contratistaObra);
            $pedido->setNumero($numero);
            $pedido->setFecha($fecha);
            $pedido->setNecesarioParaFecha($necesarioparafecha);

            $em->persist($pedido);
            $em->flush();

            $arrproductos = $request->request->get('arrproductos');
            $indice = 0;
            $arrprod = explode(',', $arrproductos);//paso a arreglo
            $longitud = count($arrprod);
            while($indice < $longitud){
                $producto = $em->getRepository('AppBundle:Producto')->find($arrprod[$indice]);
                $cantidad = $arrprod[$indice+1];

                $detallePedido = new DetallePedido();
                $detallePedido
                    ->setIdPedido($pedido)
                    ->setIdProducto($producto)
                    ->setCantidad($cantidad);

                $em->persist($detallePedido);
                $em->flush();

                $indice += 2;
            }

            $em->getRepository('AppBundle:EstadoPedido')->newStatus($pedido, 1);

            return $this->redirectToRoute('pedido_show', array('id' => $pedido->getId()));
        }

        //select all the products
        $productos = $em->getRepository('AppBundle:Producto')->findAll();

        //select "obras"
        //next update, filter contractor "obras" or find all if user logged is admin
        //inner join obra_finalizacion WITH (bla bla) where obra.fecha_inicio >= hoy-30
        $obras = $em->getRepository('AppBundle:Obra')->findAll();

        //select last request number
        $query = $em->createQuery("SELECT MAX(p.numero) AS numero FROM AppBundle:Pedido p");
        $pedido = $query->getResult();

        return $this->render('pedido/new.html.twig', array(
            'pedido' => $pedido[0],
            'productos' => $productos,
            'obras' => $obras
        ));
    }

    /**
     * Finds and displays a pedido entity.
     *
     * @Route("/{id}", name="pedido_show")
     * @Method("GET")
     */
    public function showAction(Pedido $pedido)
    {
        $deleteForm = $this->createDeleteForm($pedido);

        $em = $this->getDoctrine()->getManager();

        $dqlPedido = "
            SELECT p.id, p.numero, p.fecha, p.necesarioParaFecha, o.id AS obraId, o.nombre AS obraNombre, c.razonSocial FROM AppBundle:Pedido p
            INNER JOIN AppBundle:ContratistaObra co WITH p.idContratistaObra = co.id
            INNER JOIN AppBundle:Obra o WITH co.idObra = o.id
            INNER JOIN AppBundle:ContratistaRubro cr WITH co.idContratistaRubro = cr.id
            INNER JOIN AppBundle:Contratista c WITH cr.idContratista = c.id
            WHERE p.id = :id
        ";

        $queryPedido = $em->createQuery($dqlPedido)
            ->setParameter('id', $pedido->getId());

        $resPedido = $queryPedido->getResult();

        $dqlDetalles = "
            SELECT d.id, d.cantidad, p.nombre FROM AppBundle:DetallePedido d
            INNER JOIN AppBundle:Producto p WITH d.idProducto = p.id
            WHERE d.idPedido = :id
        ";

        $queryDetalles = $em->createQuery($dqlDetalles)
            ->setParameter('id', $pedido->getId());

        $detalles = $queryDetalles->getResult();

        return $this->render('pedido/show.html.twig', array(
            'pedido' => $resPedido[0],
            'detalles' => $detalles,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pedido entity.
     *
     * @Route("/{id}/edit", name="pedido_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pedido $pedido)
    {
        $deleteForm = $this->createDeleteForm($pedido);

        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {//edito

            //temporary data
            $obra = $em
                ->getRepository('AppBundle:Obra')
                ->find($request->request
                    ->get('idobra'));

            //temporary data
            $contratistaRubro = $em
                ->getRepository('AppBundle:ContratistaRubro')
                ->find($request->request
                    ->get('contratistaobraselected'));

            $contratistaObra = $em
                ->getRepository('AppBundle:ContratistaObra')
                ->findOneBy(array(
                    'idObra'=>$obra->getId(),
                    'idContratistaRubro'=>$contratistaRubro->getId()));

            $contratistaObra = $em->getRepository('AppBundle:ContratistaObra')->find($contratistaObra->getId());

            //pretty useless, request number should not change, neither the date
            //$numero = $request->request->get('numero');
            //$fecha = new \DateTime($request->request->get('fecha'));

            $necesarioparafecha = new \DateTime($request->request->get('necesarioparafecha'));

            $pedido = $em->getRepository('AppBundle:Pedido')->find($pedido);
            $pedido->setIdContratistaObra($contratistaObra);
            //$pedido->setNumero($numero);
            //$pedido->setFecha($fecha);
            $pedido->setNecesarioParaFecha($necesarioparafecha);

            $em->flush();//updated

            $detalles = $pedido->getDetallePedido();
            foreach ($detalles as $deta){
                $em->remove($deta);
            }
            $em->flush();//cya

            $arrproductos = $request->request->get('arrproductos');
            $indice = 0;
            $arrprod = explode(',', $arrproductos);//paso a arreglo
            $longitud = count($arrprod);
            while($indice < $longitud){
                $producto = $em->getRepository('AppBundle:Producto')->find($arrprod[$indice]);
                $cantidad = $arrprod[$indice+1];

                $detallePedido = new DetallePedido();
                $detallePedido
                    ->setIdPedido($pedido)
                    ->setIdProducto($producto)
                    ->setCantidad($cantidad);

                $em->persist($detallePedido);
                $em->flush();

                $indice += 2;
            }

            $em->getRepository('AppBundle:EstadoPedido')->newStatus($pedido, 2);

            return $this->redirectToRoute('pedido_show', array('id' => $pedido->getId()));
        }

        //muestro formulario con datos cargados

        //select all the products
        $productos = $em->getRepository('AppBundle:Producto')->findAll();

        //select "obras"
        //next update, filter contractor "obras" or find all if user logged is admin
        //inner join obra_finalizacion WITH (bla bla) where obra.fecha_inicio >= hoy-30
        $obras = $em->getRepository('AppBundle:Obra')->findAll();

        $dql = "
            SELECT o.id AS id, o.nombre AS nombre FROM AppBundle:Obra o
            INNER JOIN AppBundle:ContratistaObra co WITH co.idObra = o.id
            WHERE co.id = :id
        ";

        $queryObra = $em->createQuery($dql)
            ->setParameter('id', $pedido->getIdContratistaObra());

        $obra = $queryObra->getResult();

        $dqlDetalles = "
            SELECT p.id AS id, d.cantidad AS cantidad, p.nombre AS nombre FROM AppBundle:DetallePedido d
            INNER JOIN AppBundle:Producto p WITH d.idProducto = p.id
            WHERE d.idPedido = :id
        ";

        $queryDetalles = $em->createQuery($dqlDetalles)
            ->setParameter('id', $pedido->getId());

        $detalles = $queryDetalles->getResult();

        return $this->render('pedido/edit.html.twig', array(
            'pedido' => $pedido,
            'productos' => $productos,
            'obra' => $obra[0],
            'obras' => $obras,
            'detalles' => $detalles,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pedido entity.
     *
     * @Route("/{id}", name="pedido_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pedido $pedido)
    {
        $form = $this->createDeleteForm($pedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pedido);
            $em->flush();
        }

        return $this->redirectToRoute('pedido_index');
    }

    /**
     * Creates a form to delete a pedido entity.
     *
     * @param Pedido $pedido The pedido entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pedido $pedido)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pedido_delete', array('id' => $pedido->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Busca los Pedidos de una obra
     *
     * @Route("/ajax", name="buscar_pedidos_obra")
     * @return JsonResponse|Response
     */
    public function buscarPedidosObra(Request $request){
        if ($request->isXmlHttpRequest()) {
            if ($request->request->get('idobra')) {
                $idobra = $request->request->get('idobra');
                $em = $this->getDoctrine()->getManager();

                $dql = "          
                    SELECT p.id, p.numero, p.fecha, p.necesarioParaFecha, c.razonSocial FROM AppBundle:Pedido p
                    INNER JOIN AppBundle:ContratistaObra co WITH p.idContratistaObra = co.id
                    INNER JOIN AppBundle:Obra o WITH co.idObra = o.id
                    INNER JOIN AppBundle:ContratistaRubro cr WITH co.idContratistaRubro = cr.id
                    INNER JOIN AppBundle:Contratista c WITH cr.idContratista = c.id
                    INNER JOIN AppBundle:EstadoPedido ep WITH ep.idPedido = p.id
                    WHERE o.id = :id AND ep.idEstado <=2 AND ep.fecha IN 
                        (SELECT MAX(ep2.fecha) FROM AppBundle:EstadoPedido ep2
                        GROUP BY ep2.idPedido)
                ";

                $query = $em->createQuery($dql)
                    ->setParameter('id', $idobra);

                $pedidosObra = $query->getResult();

                return new JsonResponse($pedidosObra);
            }
        }
        return $this->redirectToRoute('ordencompra_new');
    }
}
