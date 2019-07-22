<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetallePresupuesto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detallepresupuesto controller.
 *
 * @Route("detallepresupuesto")
 */
class DetallePresupuestoController extends Controller
{
    /**
     * Lists all detallePresupuesto entities.
     *
     * @Route("/", name="detallepresupuesto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detallePresupuestos = $em->getRepository('AppBundle:DetallePresupuesto')->findAll();

        return $this->render('detallepresupuesto/index.html.twig', array(
            'detallePresupuestos' => $detallePresupuestos,
        ));
    }

    /**
     * Creates a new detallePresupuesto entity.
     *
     * @Route("/new", name="detallepresupuesto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detallePresupuesto = new DetallePresupuesto();
        $form = $this->createForm('AppBundle\Form\DetallePresupuestoType', $detallePresupuesto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detallePresupuesto);
            $em->flush();

            return $this->redirectToRoute('detallepresupuesto_show', array('id' => $detallePresupuesto->getId()));
        }

        return $this->render('detallepresupuesto/new.html.twig', array(
            'detallePresupuesto' => $detallePresupuesto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detallePresupuesto entity.
     *
     * @Route("/{id}", name="detallepresupuesto_show")
     * @Method("GET")
     */
    public function showAction(DetallePresupuesto $detallePresupuesto)
    {
        $deleteForm = $this->createDeleteForm($detallePresupuesto);

        return $this->render('detallepresupuesto/show.html.twig', array(
            'detallePresupuesto' => $detallePresupuesto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detallePresupuesto entity.
     *
     * @Route("/{id}/edit", name="detallepresupuesto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetallePresupuesto $detallePresupuesto)
    {
        $deleteForm = $this->createDeleteForm($detallePresupuesto);
        $editForm = $this->createForm('AppBundle\Form\DetallePresupuestoType', $detallePresupuesto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detallepresupuesto_edit', array('id' => $detallePresupuesto->getId()));
        }

        return $this->render('detallepresupuesto/edit.html.twig', array(
            'detallePresupuesto' => $detallePresupuesto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detallePresupuesto entity.
     *
     * @Route("/{id}", name="detallepresupuesto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetallePresupuesto $detallePresupuesto)
    {
        $form = $this->createDeleteForm($detallePresupuesto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detallePresupuesto);
            $em->flush();
        }

        return $this->redirectToRoute('detallepresupuesto_index');
    }

    /**
     * Creates a form to delete a detallePresupuesto entity.
     *
     * @param DetallePresupuesto $detallePresupuesto The detallePresupuesto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetallePresupuesto $detallePresupuesto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallepresupuesto_delete', array('id' => $detallePresupuesto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
