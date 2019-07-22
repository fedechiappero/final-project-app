<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Transferencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Transferencia controller.
 *
 * @Route("transferencia")
 */
class TransferenciaController extends Controller
{
    /**
     * Lists all transferencia entities.
     *
     * @Route("/", name="transferencia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transferencias = $em->getRepository('AppBundle:Transferencia')->findAll();

        return $this->render('transferencia/index.html.twig', array(
            'transferencias' => $transferencias,
        ));
    }

    /**
     * Creates a new transferencia entity.
     *
     * @Route("/new", name="transferencia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $transferencia = new Transferencia();
        $form = $this->createForm('AppBundle\Form\TransferenciaType', $transferencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transferencia);
            $em->flush();

            return $this->redirectToRoute('transferencia_show', array('id' => $transferencia->getId()));
        }

        return $this->render('transferencia/new.html.twig', array(
            'transferencia' => $transferencia,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a transferencia entity.
     *
     * @Route("/{id}", name="transferencia_show")
     * @Method("GET")
     */
    public function showAction(Transferencia $transferencia)
    {
        $deleteForm = $this->createDeleteForm($transferencia);

        return $this->render('transferencia/show.html.twig', array(
            'transferencia' => $transferencia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing transferencia entity.
     *
     * @Route("/{id}/edit", name="transferencia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Transferencia $transferencia)
    {
        $deleteForm = $this->createDeleteForm($transferencia);
        $editForm = $this->createForm('AppBundle\Form\TransferenciaType', $transferencia);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transferencia_edit', array('id' => $transferencia->getId()));
        }

        return $this->render('transferencia/edit.html.twig', array(
            'transferencia' => $transferencia,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a transferencia entity.
     *
     * @Route("/{id}", name="transferencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Transferencia $transferencia)
    {
        $form = $this->createDeleteForm($transferencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($transferencia);
            $em->flush();
        }

        return $this->redirectToRoute('transferencia_index');
    }

    /**
     * Creates a form to delete a transferencia entity.
     *
     * @param Transferencia $transferencia The transferencium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Transferencia $transferencia)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transferencia_delete', array('id' => $transferencia->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
