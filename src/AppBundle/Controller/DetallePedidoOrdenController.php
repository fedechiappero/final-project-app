<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetallePedidoOrden;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detallepedidoorden controller.
 *
 * @Route("detallepedidoorden")
 */
class DetallePedidoOrdenController extends Controller
{
    /**
     * Lists all detallePedidoOrden entities.
     *
     * @Route("/", name="detallepedidoorden_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detallePedidoOrdens = $em->getRepository('AppBundle:DetallePedidoOrden')->findAll();

        return $this->render('detallepedidoorden/index.html.twig', array(
            'detallePedidoOrdens' => $detallePedidoOrdens,
        ));
    }

    /**
     * Creates a new detallePedidoOrden entity.
     *
     * @Route("/new", name="detallepedidoorden_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detallePedidoOrden = new DetallePedidoOrden();
        $form = $this->createForm('AppBundle\Form\DetallePedidoOrdenType', $detallePedidoOrden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detallePedidoOrden);
            $em->flush();

            return $this->redirectToRoute('detallepedidoorden_show', array('id' => $detallePedidoOrden->getId()));
        }

        return $this->render('detallepedidoorden/new.html.twig', array(
            'detallePedidoOrden' => $detallePedidoOrden,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detallePedidoOrden entity.
     *
     * @Route("/{id}", name="detallepedidoorden_show")
     * @Method("GET")
     */
    public function showAction(DetallePedidoOrden $detallePedidoOrden)
    {
        $deleteForm = $this->createDeleteForm($detallePedidoOrden);

        return $this->render('detallepedidoorden/show.html.twig', array(
            'detallePedidoOrden' => $detallePedidoOrden,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detallePedidoOrden entity.
     *
     * @Route("/{id}/edit", name="detallepedidoorden_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetallePedidoOrden $detallePedidoOrden)
    {
        $deleteForm = $this->createDeleteForm($detallePedidoOrden);
        $editForm = $this->createForm('AppBundle\Form\DetallePedidoOrdenType', $detallePedidoOrden);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detallepedidoorden_edit', array('id' => $detallePedidoOrden->getId()));
        }

        return $this->render('detallepedidoorden/edit.html.twig', array(
            'detallePedidoOrden' => $detallePedidoOrden,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detallePedidoOrden entity.
     *
     * @Route("/{id}", name="detallepedidoorden_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetallePedidoOrden $detallePedidoOrden)
    {
        $form = $this->createDeleteForm($detallePedidoOrden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detallePedidoOrden);
            $em->flush();
        }

        return $this->redirectToRoute('detallepedidoorden_index');
    }

    /**
     * Creates a form to delete a detallePedidoOrden entity.
     *
     * @param DetallePedidoOrden $detallePedidoOrden The detallePedidoOrden entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetallePedidoOrden $detallePedidoOrden)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallepedidoorden_delete', array('id' => $detallePedidoOrden->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
