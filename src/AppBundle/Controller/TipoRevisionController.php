<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoRevision;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tiporevision controller.
 *
 * @Route("tiporevision")
 */
class TipoRevisionController extends Controller
{
    /**
     * Lists all tipoRevision entities.
     *
     * @Route("/", name="tiporevision_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoRevisions = $em->getRepository('AppBundle:TipoRevision')->findAll();

        return $this->render('tiporevision/index.html.twig', array(
            'tipoRevisions' => $tipoRevisions,
        ));
    }

    /**
     * Creates a new tipoRevision entity.
     *
     * @Route("/new", name="tiporevision_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoRevision = new TipoRevision();
        $form = $this->createForm('AppBundle\Form\TipoRevisionType', $tipoRevision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoRevision);
            $em->flush();

            return $this->redirectToRoute('tiporevision_show', array('id' => $tipoRevision->getId()));
        }

        return $this->render('tiporevision/new.html.twig', array(
            'tipoRevision' => $tipoRevision,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipoRevision entity.
     *
     * @Route("/{id}", name="tiporevision_show")
     * @Method("GET")
     */
    public function showAction(TipoRevision $tipoRevision)
    {
        $deleteForm = $this->createDeleteForm($tipoRevision);

        return $this->render('tiporevision/show.html.twig', array(
            'tipoRevision' => $tipoRevision,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipoRevision entity.
     *
     * @Route("/{id}/edit", name="tiporevision_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoRevision $tipoRevision)
    {
        $deleteForm = $this->createDeleteForm($tipoRevision);
        $editForm = $this->createForm('AppBundle\Form\TipoRevisionType', $tipoRevision);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tiporevision_edit', array('id' => $tipoRevision->getId()));
        }

        return $this->render('tiporevision/edit.html.twig', array(
            'tipoRevision' => $tipoRevision,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipoRevision entity.
     *
     * @Route("/{id}", name="tiporevision_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoRevision $tipoRevision)
    {
        $form = $this->createDeleteForm($tipoRevision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoRevision);
            $em->flush();
        }

        return $this->redirectToRoute('tiporevision_index');
    }

    /**
     * Creates a form to delete a tipoRevision entity.
     *
     * @param TipoRevision $tipoRevision The tipoRevision entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoRevision $tipoRevision)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tiporevision_delete', array('id' => $tipoRevision->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
