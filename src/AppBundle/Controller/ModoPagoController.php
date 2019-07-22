<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ModoPago;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Modopago controller.
 *
 * @Route("modopago")
 */
class ModoPagoController extends Controller
{
    /**
     * Lists all modoPago entities.
     *
     * @Route("/", name="modopago_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modoPagos = $em->getRepository('AppBundle:ModoPago')->findAll();

        return $this->render('modopago/index.html.twig', array(
            'modoPagos' => $modoPagos,
        ));
    }

    /**
     * Creates a new modoPago entity.
     *
     * @Route("/new", name="modopago_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $modoPago = new ModoPago();
        $form = $this->createForm('AppBundle\Form\ModoPagoType', $modoPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modoPago);
            $em->flush();

            return $this->redirectToRoute('modopago_show', array('id' => $modoPago->getId()));
        }

        return $this->render('modopago/new.html.twig', array(
            'modoPago' => $modoPago,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a modoPago entity.
     *
     * @Route("/{id}", name="modopago_show")
     * @Method("GET")
     */
    public function showAction(ModoPago $modoPago)
    {
        $deleteForm = $this->createDeleteForm($modoPago);

        return $this->render('modopago/show.html.twig', array(
            'modoPago' => $modoPago,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing modoPago entity.
     *
     * @Route("/{id}/edit", name="modopago_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ModoPago $modoPago)
    {
        $deleteForm = $this->createDeleteForm($modoPago);
        $editForm = $this->createForm('AppBundle\Form\ModoPagoType', $modoPago);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modopago_edit', array('id' => $modoPago->getId()));
        }

        return $this->render('modopago/edit.html.twig', array(
            'modoPago' => $modoPago,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a modoPago entity.
     *
     * @Route("/{id}", name="modopago_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ModoPago $modoPago)
    {
        $form = $this->createDeleteForm($modoPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modoPago);
            $em->flush();
        }

        return $this->redirectToRoute('modopago_index');
    }

    /**
     * Creates a form to delete a modoPago entity.
     *
     * @param ModoPago $modoPago The modoPago entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ModoPago $modoPago)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modopago_delete', array('id' => $modoPago->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
