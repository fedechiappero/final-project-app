<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetalleOrden;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Detalleorden controller.
 *
 * @Route("detalleorden")
 */
class DetalleOrdenController extends Controller
{
    /**
     * Lists all detalleOrden entities.
     *
     * @Route("/", name="detalleorden_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detalleOrdens = $em->getRepository('AppBundle:DetalleOrden')->findAll();

        return $this->render('detalleorden/index.html.twig', array(
            'detalleOrdens' => $detalleOrdens,
        ));
    }

    /**
     * Creates a new detalleOrden entity.
     *
     * @Route("/new", name="detalleorden_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detalleOrden = new DetalleOrden();
        $form = $this->createForm('AppBundle\Form\DetalleOrdenType', $detalleOrden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detalleOrden);
            $em->flush();

            return $this->redirectToRoute('detalleorden_show', array('id' => $detalleOrden->getId()));
        }

        return $this->render('detalleorden/new.html.twig', array(
            'detalleOrden' => $detalleOrden,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalleOrden entity.
     *
     * @Route("/{id}", name="detalleorden_show")
     * @Method("GET")
     */
    public function showAction(DetalleOrden $detalleOrden)
    {
        $deleteForm = $this->createDeleteForm($detalleOrden);

        return $this->render('detalleorden/show.html.twig', array(
            'detalleOrden' => $detalleOrden,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detalleOrden entity.
     *
     * @Route("/{id}/edit", name="detalleorden_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetalleOrden $detalleOrden)
    {
        $deleteForm = $this->createDeleteForm($detalleOrden);
        $editForm = $this->createForm('AppBundle\Form\DetalleOrdenType', $detalleOrden);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detalleorden_edit', array('id' => $detalleOrden->getId()));
        }

        return $this->render('detalleorden/edit.html.twig', array(
            'detalleOrden' => $detalleOrden,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detalleOrden entity.
     *
     * @Route("/{id}", name="detalleorden_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetalleOrden $detalleOrden)
    {
        $form = $this->createDeleteForm($detalleOrden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detalleOrden);
            $em->flush();
        }

        return $this->redirectToRoute('detalleorden_index');
    }

    /**
     * Creates a form to delete a detalleOrden entity.
     *
     * @param DetalleOrden $detalleOrden The detalleOrden entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetalleOrden $detalleOrden)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detalleorden_delete', array('id' => $detalleOrden->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * busca detalle para una orden a partir de un pedido
     *
     * @Route("/ajax", name="buscar_detalle_orden")
     * @return JsonResponse|Response
     */
    public function buscarDetalleOrden(Request $request){
        if ($request->isXmlHttpRequest()) {
            if ($request->request->get('idpedido')) {
                $idpedido = $request->request->get('idpedido');
                $idproveedor = $request->request->get('idproveedor');
                $em = $this->getDoctrine()->getManager();


                //that may not be the updated price product.. check new orden compra procedure
                $dqlDetalle = "
                    SELECT pe.id AS pedidoid, p.id AS productoid, p.nombre, dp.cantidad, p.stock, pr.precio FROM AppBundle:Producto p
                    INNER JOIN AppBundle:Precio pr WITH pr.idProducto = p.id
                    INNER JOIN AppBundle:DetallePedido dp WITH dp.idProducto = p.id
                    INNER JOIN AppBundle:Pedido pe WITH dp.idPedido = pe.id
                    WHERE pr.idProveedor = :proveedor AND dp.idPedido = :pedido
                ";

                $queryDetalle = $em->createQuery($dqlDetalle)
                    ->setParameter('proveedor',$idproveedor)
                    ->setParameter('pedido', $idpedido);

                $detalle = $queryDetalle->getResult();

                return new JsonResponse($detalle);
            }
        }
        return $this->redirectToRoute('ordencompra_new');
    }
}
