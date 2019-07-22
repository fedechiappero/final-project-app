<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SitioTarea;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Sitiotarea controller.
 *
 * @Route("sitiotarea")
 */
class SitioTareaController extends Controller
{
    /**
     * Lists all sitioTarea entities.
     *
     * @Route("/", name="sitiotarea_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sitioTareas = $em->getRepository('AppBundle:SitioTarea')->findAll();

        return $this->render('sitiotarea/index.html.twig', array(
            'sitioTareas' => $sitioTareas,
        ));
    }

    /**
     * Creates a new sitioTarea entity.
     *
     * @Route("/new", name="sitiotarea_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sitioTarea = new SitioTarea();
        $form = $this->createForm('AppBundle\Form\SitioTareaType', $sitioTarea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sitioTarea);
            $em->flush();

            return $this->redirectToRoute('sitiotarea_show', array('id' => $sitioTarea->getId()));
        }

        return $this->render('sitiotarea/new.html.twig', array(
            'sitioTarea' => $sitioTarea,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sitioTarea entity.
     *
     * @Route("/{id}", name="sitiotarea_show")
     * @Method("GET")
     */
    public function showAction(SitioTarea $sitioTarea)
    {
        $deleteForm = $this->createDeleteForm($sitioTarea);

        return $this->render('sitiotarea/show.html.twig', array(
            'sitioTarea' => $sitioTarea,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sitioTarea entity.
     *
     * @Route("/{id}/edit", name="sitiotarea_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SitioTarea $sitioTarea)
    {
        $deleteForm = $this->createDeleteForm($sitioTarea);
        $editForm = $this->createForm('AppBundle\Form\SitioTareaType', $sitioTarea);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sitiotarea_edit', array('id' => $sitioTarea->getId()));
        }

        return $this->render('sitiotarea/edit.html.twig', array(
            'sitioTarea' => $sitioTarea,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sitioTarea entity.
     *
     * @Route("/{id}", name="sitiotarea_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SitioTarea $sitioTarea)
    {
        $form = $this->createDeleteForm($sitioTarea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sitioTarea);
            $em->flush();
        }

        return $this->redirectToRoute('sitiotarea_index');
    }

    /**
     * Creates a form to delete a sitioTarea entity.
     *
     * @param SitioTarea $sitioTarea The sitioTarea entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SitioTarea $sitioTarea)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sitiotarea_delete', array('id' => $sitioTarea->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
