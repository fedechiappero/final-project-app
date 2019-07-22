<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetalleRevision;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detallerevision controller.
 *
 * @Route("detallerevision")
 */
class DetalleRevisionController extends Controller
{
    /**
     * Lists all detalleRevision entities.
     *
     * @Route("/", name="detallerevision_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detalleRevisions = $em->getRepository('AppBundle:DetalleRevision')->findAll();

        return $this->render('detallerevision/index.html.twig', array(
            'detalleRevisions' => $detalleRevisions,
        ));
    }

    /**
     * Creates a new detalleRevision entity.
     *
     * @Route("/new", name="detallerevision_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detalleRevision = new DetalleRevision();
        $form = $this->createForm('AppBundle\Form\DetalleRevisionType', $detalleRevision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detalleRevision);
            $em->flush();

            return $this->redirectToRoute('detallerevision_show', array('id' => $detalleRevision->getId()));
        }

        return $this->render('detallerevision/new.html.twig', array(
            'detalleRevision' => $detalleRevision,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalleRevision entity.
     *
     * @Route("/{id}", name="detallerevision_show")
     * @Method("GET")
     */
    public function showAction(DetalleRevision $detalleRevision)
    {
        $deleteForm = $this->createDeleteForm($detalleRevision);

        return $this->render('detallerevision/show.html.twig', array(
            'detalleRevision' => $detalleRevision,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detalleRevision entity.
     *
     * @Route("/{id}/edit", name="detallerevision_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetalleRevision $detalleRevision)
    {
        $deleteForm = $this->createDeleteForm($detalleRevision);
        $editForm = $this->createForm('AppBundle\Form\DetalleRevisionType', $detalleRevision);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detallerevision_edit', array('id' => $detalleRevision->getId()));
        }

        return $this->render('detallerevision/edit.html.twig', array(
            'detalleRevision' => $detalleRevision,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detalleRevision entity.
     *
     * @Route("/{id}", name="detallerevision_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetalleRevision $detalleRevision)
    {
        $form = $this->createDeleteForm($detalleRevision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detalleRevision);
            $em->flush();
        }

        return $this->redirectToRoute('detallerevision_index');
    }

    /**
     * Creates a form to delete a detalleRevision entity.
     *
     * @param DetalleRevision $detalleRevision The detalleRevision entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetalleRevision $detalleRevision)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallerevision_delete', array('id' => $detalleRevision->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
