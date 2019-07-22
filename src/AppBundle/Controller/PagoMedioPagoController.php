<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PagoMedioPago;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pagomediopago controller.
 *
 * @Route("pagomediopago")
 */
class PagoMedioPagoController extends Controller
{
    /**
     * Lists all pagoMedioPago entities.
     *
     * @Route("/", name="pagomediopago_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pagoMedioPagos = $em->getRepository('AppBundle:PagoMedioPago')->findAll();

        return $this->render('pagomediopago/index.html.twig', array(
            'pagoMedioPagos' => $pagoMedioPagos,
        ));
    }

    /**
     * Creates a new pagoMedioPago entity.
     *
     * @Route("/new", name="pagomediopago_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pagoMedioPago = new PagoMedioPago();
        $form = $this->createForm('AppBundle\Form\PagoMedioPagoType', $pagoMedioPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pagoMedioPago);
            $em->flush();

            return $this->redirectToRoute('pagomediopago_show', array('id' => $pagoMedioPago->getId()));
        }

        return $this->render('pagomediopago/new.html.twig', array(
            'pagoMedioPago' => $pagoMedioPago,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pagoMedioPago entity.
     *
     * @Route("/{id}", name="pagomediopago_show")
     * @Method("GET")
     */
    public function showAction(PagoMedioPago $pagoMedioPago)
    {
        $deleteForm = $this->createDeleteForm($pagoMedioPago);

        return $this->render('pagomediopago/show.html.twig', array(
            'pagoMedioPago' => $pagoMedioPago,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pagoMedioPago entity.
     *
     * @Route("/{id}/edit", name="pagomediopago_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PagoMedioPago $pagoMedioPago)
    {
        $deleteForm = $this->createDeleteForm($pagoMedioPago);
        $editForm = $this->createForm('AppBundle\Form\PagoMedioPagoType', $pagoMedioPago);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pagomediopago_edit', array('id' => $pagoMedioPago->getId()));
        }

        return $this->render('pagomediopago/edit.html.twig', array(
            'pagoMedioPago' => $pagoMedioPago,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pagoMedioPago entity.
     *
     * @Route("/{id}", name="pagomediopago_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PagoMedioPago $pagoMedioPago)
    {
        $form = $this->createDeleteForm($pagoMedioPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pagoMedioPago);
            $em->flush();
        }

        return $this->redirectToRoute('pagomediopago_index');
    }

    /**
     * Creates a form to delete a pagoMedioPago entity.
     *
     * @param PagoMedioPago $pagoMedioPago The pagoMedioPago entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PagoMedioPago $pagoMedioPago)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pagomediopago_delete', array('id' => $pagoMedioPago->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
