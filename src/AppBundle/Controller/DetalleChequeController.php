<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetalleCheque;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detallecheque controller.
 *
 * @Route("detallecheque")
 */
class DetalleChequeController extends Controller
{
    /**
     * Lists all detalleCheque entities.
     *
     * @Route("/", name="detallecheque_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detalleCheques = $em->getRepository('AppBundle:DetalleCheque')->findAll();

        return $this->render('detallecheque/index.html.twig', array(
            'detalleCheques' => $detalleCheques,
        ));
    }

    /**
     * Creates a new detalleCheque entity.
     *
     * @Route("/new", name="detallecheque_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detalleCheque = new DetalleCheque();
        $form = $this->createForm('AppBundle\Form\DetalleChequeType', $detalleCheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detalleCheque);
            $em->flush();

            return $this->redirectToRoute('detallecheque_show', array('id' => $detalleCheque->getId()));
        }

        return $this->render('detallecheque/new.html.twig', array(
            'detalleCheque' => $detalleCheque,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalleCheque entity.
     *
     * @Route("/{id}", name="detallecheque_show")
     * @Method("GET")
     */
    public function showAction(DetalleCheque $detalleCheque)
    {
        $deleteForm = $this->createDeleteForm($detalleCheque);

        return $this->render('detallecheque/show.html.twig', array(
            'detalleCheque' => $detalleCheque,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detalleCheque entity.
     *
     * @Route("/{id}/edit", name="detallecheque_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetalleCheque $detalleCheque)
    {
        $deleteForm = $this->createDeleteForm($detalleCheque);
        $editForm = $this->createForm('AppBundle\Form\DetalleChequeType', $detalleCheque);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detallecheque_edit', array('id' => $detalleCheque->getId()));
        }

        return $this->render('detallecheque/edit.html.twig', array(
            'detalleCheque' => $detalleCheque,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detalleCheque entity.
     *
     * @Route("/{id}", name="detallecheque_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetalleCheque $detalleCheque)
    {
        $form = $this->createDeleteForm($detalleCheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detalleCheque);
            $em->flush();
        }

        return $this->redirectToRoute('detallecheque_index');
    }

    /**
     * Creates a form to delete a detalleCheque entity.
     *
     * @param DetalleCheque $detalleCheque The detalleCheque entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetalleCheque $detalleCheque)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallecheque_delete', array('id' => $detalleCheque->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
