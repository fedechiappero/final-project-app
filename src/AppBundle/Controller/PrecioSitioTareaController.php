<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PrecioSitioTarea;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Preciositiotarea controller.
 *
 * @Route("preciositiotarea")
 */
class PrecioSitioTareaController extends Controller
{
    /**
     * Lists all precioSitioTarea entities.
     *
     * @Route("/", name="preciositiotarea_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $precioSitioTareas = $em->getRepository('AppBundle:PrecioSitioTarea')->findAll();

        return $this->render('preciositiotarea/index.html.twig', array(
            'precioSitioTareas' => $precioSitioTareas,
        ));
    }

    /**
     * Creates a new precioSitioTarea entity.
     *
     * @Route("/new", name="preciositiotarea_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $precioSitioTarea = new PrecioSitioTarea();
        $form = $this->createForm('AppBundle\Form\PrecioSitioTareaType', $precioSitioTarea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($precioSitioTarea);
            $em->flush();

            return $this->redirectToRoute('preciositiotarea_show', array('id' => $precioSitioTarea->getId()));
        }

        return $this->render('preciositiotarea/new.html.twig', array(
            'precioSitioTarea' => $precioSitioTarea,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a precioSitioTarea entity.
     *
     * @Route("/{id}", name="preciositiotarea_show")
     * @Method("GET")
     */
    public function showAction(PrecioSitioTarea $precioSitioTarea)
    {
        $deleteForm = $this->createDeleteForm($precioSitioTarea);

        return $this->render('preciositiotarea/show.html.twig', array(
            'precioSitioTarea' => $precioSitioTarea,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing precioSitioTarea entity.
     *
     * @Route("/{id}/edit", name="preciositiotarea_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PrecioSitioTarea $precioSitioTarea)
    {
        $deleteForm = $this->createDeleteForm($precioSitioTarea);
        $editForm = $this->createForm('AppBundle\Form\PrecioSitioTareaType', $precioSitioTarea);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('preciositiotarea_edit', array('id' => $precioSitioTarea->getId()));
        }

        return $this->render('preciositiotarea/edit.html.twig', array(
            'precioSitioTarea' => $precioSitioTarea,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a precioSitioTarea entity.
     *
     * @Route("/{id}", name="preciositiotarea_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PrecioSitioTarea $precioSitioTarea)
    {
        $form = $this->createDeleteForm($precioSitioTarea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($precioSitioTarea);
            $em->flush();
        }

        return $this->redirectToRoute('preciositiotarea_index');
    }

    /**
     * Creates a form to delete a precioSitioTarea entity.
     *
     * @param PrecioSitioTarea $precioSitioTarea The precioSitioTarea entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PrecioSitioTarea $precioSitioTarea)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('preciositiotarea_delete', array('id' => $precioSitioTarea->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
