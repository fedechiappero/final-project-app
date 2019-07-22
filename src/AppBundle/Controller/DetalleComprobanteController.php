<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetalleComprobante;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detallecomprobante controller.
 *
 * @Route("detallecomprobante")
 */
class DetalleComprobanteController extends Controller
{
    /**
     * Lists all detalleComprobante entities.
     *
     * @Route("/", name="detallecomprobante_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detalleComprobantes = $em->getRepository('AppBundle:DetalleComprobante')->findAll();

        return $this->render('detallecomprobante/index.html.twig', array(
            'detalleComprobantes' => $detalleComprobantes,
        ));
    }

    /**
     * Creates a new detalleComprobante entity.
     *
     * @Route("/new", name="detallecomprobante_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detalleComprobante = new DetalleComprobante();
        $form = $this->createForm('AppBundle\Form\DetalleComprobanteType', $detalleComprobante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detalleComprobante);
            $em->flush();

            return $this->redirectToRoute('detallecomprobante_show', array('id' => $detalleComprobante->getId()));
        }

        return $this->render('detallecomprobante/new.html.twig', array(
            'detalleComprobante' => $detalleComprobante,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalleComprobante entity.
     *
     * @Route("/{id}", name="detallecomprobante_show")
     * @Method("GET")
     */
    public function showAction(DetalleComprobante $detalleComprobante)
    {
        $deleteForm = $this->createDeleteForm($detalleComprobante);

        return $this->render('detallecomprobante/show.html.twig', array(
            'detalleComprobante' => $detalleComprobante,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detalleComprobante entity.
     *
     * @Route("/{id}/edit", name="detallecomprobante_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetalleComprobante $detalleComprobante)
    {
        $deleteForm = $this->createDeleteForm($detalleComprobante);
        $editForm = $this->createForm('AppBundle\Form\DetalleComprobanteType', $detalleComprobante);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detallecomprobante_edit', array('id' => $detalleComprobante->getId()));
        }

        return $this->render('detallecomprobante/edit.html.twig', array(
            'detalleComprobante' => $detalleComprobante,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detalleComprobante entity.
     *
     * @Route("/{id}", name="detallecomprobante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetalleComprobante $detalleComprobante)
    {
        $form = $this->createDeleteForm($detalleComprobante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detalleComprobante);
            $em->flush();
        }

        return $this->redirectToRoute('detallecomprobante_index');
    }

    /**
     * Creates a form to delete a detalleComprobante entity.
     *
     * @param DetalleComprobante $detalleComprobante The detalleComprobante entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetalleComprobante $detalleComprobante)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallecomprobante_delete', array('id' => $detalleComprobante->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
