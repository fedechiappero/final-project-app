<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetalleTransferencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detalletransferencia controller.
 *
 * @Route("detalletransferencia")
 */
class DetalleTransferenciaController extends Controller
{
    /**
     * Lists all detalletransferencia entities.
     *
     * @Route("/", name="detalletransferencia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detalleTransferencias = $em->getRepository('AppBundle:DetalleTransferencia')->findAll();

        return $this->render('detalletransferencia/index.html.twig', array(
            'detalleTransferencias' => $detalleTransferencias,
        ));
    }

    /**
     * Creates a new detalletransferencia entity.
     *
     * @Route("/new", name="detalletransferencia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detalleTransferencia = new DetalleTransferencia();
        $form = $this->createForm('AppBundle\Form\DetalleTransferenciaType', $detalleTransferencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detalleTransferencia);
            $em->flush();

            return $this->redirectToRoute('detalletransferencia_show', array('id' => $detalleTransferencia->getId()));
        }

        return $this->render('detalletransferencia/new.html.twig', array(
            'detalleTransferencia' => $detalleTransferencia,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalleTransferencia entity.
     *
     * @Route("/{id}", name="detalletransferencia_show")
     * @Method("GET")
     */
    public function showAction(DetalleTransferencia $detalleTransferencia)
    {
        $deleteForm = $this->createDeleteForm($detalleTransferencia);

        return $this->render('detalletransferencia/show.html.twig', array(
            'detalleTransferencia' => $detalleTransferencia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detalleTransferencia entity.
     *
     * @Route("/{id}/edit", name="detalletransferencia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetalleTransferencia $detalleTransferencia)
    {
        $deleteForm = $this->createDeleteForm($detalleTransferencia);
        $editForm = $this->createForm('AppBundle\Form\DetalleTransferenciaType', $detalleTransferencia);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detalletransferencia_edit', array('id' => $detalleTransferencia->getId()));
        }

        return $this->render('detalletransferencia/edit.html.twig', array(
            'detalleTransferencia' => $detalleTransferencia,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detalleTransferencia entity.
     *
     * @Route("/{id}", name="detalletransferencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetalleTransferencia $detalleTransferencia)
    {
        $form = $this->createDeleteForm($detalleTransferencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detalleTransferencia);
            $em->flush();
        }

        return $this->redirectToRoute('detalletransferencia_index');
    }

    /**
     * Creates a form to delete a detalleTransferencia entity.
     *
     * @param DetalleTransferencia $detalleTransferencia The DetalleTransferencia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetalleTransferencia $detalleTransferencia)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detalletransferencia_delete', array('id' => $detalleTransferencia->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
