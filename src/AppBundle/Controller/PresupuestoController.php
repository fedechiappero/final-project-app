<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Presupuesto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Presupuesto controller.
 *
 * @Route("presupuesto")
 */
class PresupuestoController extends Controller
{
    /**
     * Lists all presupuesto entities.
     *
     * @Route("/", name="presupuesto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presupuestos = $em->getRepository('AppBundle:Presupuesto')->findAll();

        return $this->render('presupuesto/index.html.twig', array(
            'presupuestos' => $presupuestos,
        ));
    }

    /**
     * Creates a new presupuesto entity.
     *
     * @Route("/new", name="presupuesto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $presupuesto = new Presupuesto();
        $form = $this->createForm('AppBundle\Form\PresupuestoType', $presupuesto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($presupuesto);
            $em->flush();

            return $this->redirectToRoute('presupuesto_show', array('id' => $presupuesto->getId()));
        }

        return $this->render('presupuesto/new.html.twig', array(
            'presupuesto' => $presupuesto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a presupuesto entity.
     *
     * @Route("/{id}", name="presupuesto_show")
     * @Method("GET")
     */
    public function showAction(Presupuesto $presupuesto)
    {
        $deleteForm = $this->createDeleteForm($presupuesto);

        return $this->render('presupuesto/show.html.twig', array(
            'presupuesto' => $presupuesto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing presupuesto entity.
     *
     * @Route("/{id}/edit", name="presupuesto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Presupuesto $presupuesto)
    {
        $deleteForm = $this->createDeleteForm($presupuesto);
        $editForm = $this->createForm('AppBundle\Form\PresupuestoType', $presupuesto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('presupuesto_edit', array('id' => $presupuesto->getId()));
        }

        return $this->render('presupuesto/edit.html.twig', array(
            'presupuesto' => $presupuesto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a presupuesto entity.
     *
     * @Route("/{id}", name="presupuesto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Presupuesto $presupuesto)
    {
        $form = $this->createDeleteForm($presupuesto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($presupuesto);
            $em->flush();
        }

        return $this->redirectToRoute('presupuesto_index');
    }

    /**
     * Creates a form to delete a presupuesto entity.
     *
     * @param Presupuesto $presupuesto The presupuesto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Presupuesto $presupuesto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presupuesto_delete', array('id' => $presupuesto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
