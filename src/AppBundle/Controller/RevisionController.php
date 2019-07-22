<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Revision;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Revision controller.
 *
 * @Route("revision")
 */
class RevisionController extends Controller
{
    /**
     * Lists all revision entities.
     *
     * @Route("/", name="revision_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $revisions = $em->getRepository('AppBundle:Revision')->findAll();

        return $this->render('revision/index.html.twig', array(
            'revisions' => $revisions,
        ));
    }

    /**
     * Creates a new revision entity.
     *
     * @Route("/new", name="revision_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $revision = new Revision();
        $form = $this->createForm('AppBundle\Form\RevisionType', $revision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($revision);
            $em->flush();

            return $this->redirectToRoute('revision_show', array('id' => $revision->getId()));
        }

        return $this->render('revision/new.html.twig', array(
            'revision' => $revision,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a revision entity.
     *
     * @Route("/{id}", name="revision_show")
     * @Method("GET")
     */
    public function showAction(Revision $revision)
    {
        $deleteForm = $this->createDeleteForm($revision);

        return $this->render('revision/show.html.twig', array(
            'revision' => $revision,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing revision entity.
     *
     * @Route("/{id}/edit", name="revision_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Revision $revision)
    {
        $deleteForm = $this->createDeleteForm($revision);
        $editForm = $this->createForm('AppBundle\Form\RevisionType', $revision);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('revision_edit', array('id' => $revision->getId()));
        }

        return $this->render('revision/edit.html.twig', array(
            'revision' => $revision,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a revision entity.
     *
     * @Route("/{id}", name="revision_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Revision $revision)
    {
        $form = $this->createDeleteForm($revision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($revision);
            $em->flush();
        }

        return $this->redirectToRoute('revision_index');
    }

    /**
     * Creates a form to delete a revision entity.
     *
     * @param Revision $revision The revision entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Revision $revision)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('revision_delete', array('id' => $revision->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
