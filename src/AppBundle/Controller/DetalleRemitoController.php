<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetalleRemito;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detalleremito controller.
 *
 * @Route("detalleremito")
 */
class DetalleRemitoController extends Controller
{
    /**
     * Lists all detalleRemito entities.
     *
     * @Route("/", name="detalleremito_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detalleRemitos = $em->getRepository('AppBundle:DetalleRemito')->findAll();

        return $this->render('detalleremito/index.html.twig', array(
            'detalleRemitos' => $detalleRemitos,
        ));
    }

    /**
     * Creates a new detalleRemito entity.
     *
     * @Route("/new", name="detalleremito_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detalleRemito = new DetalleRemito();
        $form = $this->createForm('AppBundle\Form\DetalleRemitoType', $detalleRemito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detalleRemito);
            $em->flush();

            return $this->redirectToRoute('detalleremito_show', array('id' => $detalleRemito->getId()));
        }

        return $this->render('detalleremito/new.html.twig', array(
            'detalleRemito' => $detalleRemito,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalleRemito entity.
     *
     * @Route("/{id}", name="detalleremito_show")
     * @Method("GET")
     */
    public function showAction(DetalleRemito $detalleRemito)
    {
        $deleteForm = $this->createDeleteForm($detalleRemito);

        return $this->render('detalleremito/show.html.twig', array(
            'detalleRemito' => $detalleRemito,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detalleRemito entity.
     *
     * @Route("/{id}/edit", name="detalleremito_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetalleRemito $detalleRemito)
    {
        $deleteForm = $this->createDeleteForm($detalleRemito);
        $editForm = $this->createForm('AppBundle\Form\DetalleRemitoType', $detalleRemito);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detalleremito_edit', array('id' => $detalleRemito->getId()));
        }

        return $this->render('detalleremito/edit.html.twig', array(
            'detalleRemito' => $detalleRemito,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detalleRemito entity.
     *
     * @Route("/{id}", name="detalleremito_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetalleRemito $detalleRemito)
    {
        $form = $this->createDeleteForm($detalleRemito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detalleRemito);
            $em->flush();
        }

        return $this->redirectToRoute('detalleremito_index');
    }

    /**
     * Creates a form to delete a detalleRemito entity.
     *
     * @param DetalleRemito $detalleRemito The detalleRemito entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetalleRemito $detalleRemito)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detalleremito_delete', array('id' => $detalleRemito->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
