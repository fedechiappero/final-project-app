<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EstadoRevision;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Estadorevision controller.
 *
 * @Route("estadorevision")
 */
class EstadoRevisionController extends Controller
{
    /**
     * Lists all estadoRevision entities.
     *
     * @Route("/", name="estadorevision_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estadoRevisions = $em->getRepository('AppBundle:EstadoRevision')->findAll();

        return $this->render('estadorevision/index.html.twig', array(
            'estadoRevisions' => $estadoRevisions,
        ));
    }

    /**
     * Creates a new estadoRevision entity.
     *
     * @Route("/new", name="estadorevision_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $estadoRevision = new EstadoRevision();
        $form = $this->createForm('AppBundle\Form\EstadoRevisionType', $estadoRevision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estadoRevision);
            $em->flush();

            return $this->redirectToRoute('estadorevision_show', array('id' => $estadoRevision->getId()));
        }

        return $this->render('estadorevision/new.html.twig', array(
            'estadoRevision' => $estadoRevision,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a estadoRevision entity.
     *
     * @Route("/{id}", name="estadorevision_show")
     * @Method("GET")
     */
    public function showAction(EstadoRevision $estadoRevision)
    {
        $deleteForm = $this->createDeleteForm($estadoRevision);

        return $this->render('estadorevision/show.html.twig', array(
            'estadoRevision' => $estadoRevision,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estadoRevision entity.
     *
     * @Route("/{id}/edit", name="estadorevision_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EstadoRevision $estadoRevision)
    {
        $deleteForm = $this->createDeleteForm($estadoRevision);
        $editForm = $this->createForm('AppBundle\Form\EstadoRevisionType', $estadoRevision);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estadorevision_edit', array('id' => $estadoRevision->getId()));
        }

        return $this->render('estadorevision/edit.html.twig', array(
            'estadoRevision' => $estadoRevision,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estadoRevision entity.
     *
     * @Route("/{id}", name="estadorevision_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EstadoRevision $estadoRevision)
    {
        $form = $this->createDeleteForm($estadoRevision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estadoRevision);
            $em->flush();
        }

        return $this->redirectToRoute('estadorevision_index');
    }

    /**
     * Creates a form to delete a estadoRevision entity.
     *
     * @param EstadoRevision $estadoRevision The estadoRevision entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EstadoRevision $estadoRevision)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadorevision_delete', array('id' => $estadoRevision->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
