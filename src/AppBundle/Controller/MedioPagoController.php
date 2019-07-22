<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MedioPago;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Mediopago controller.
 *
 * @Route("mediopago")
 */
class MedioPagoController extends Controller
{
    /**
     * Lists all medioPago entities.
     *
     * @Route("/", name="mediopago_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medioPagos = $em->getRepository('AppBundle:MedioPago')->findAll();

        return $this->render('mediopago/index.html.twig', array(
            'medioPagos' => $medioPagos,
        ));
    }

    /**
     * Creates a new medioPago entity.
     *
     * @Route("/new", name="mediopago_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $medioPago = new MedioPago();
        $form = $this->createForm('AppBundle\Form\MedioPagoType', $medioPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medioPago);
            $em->flush();

            return $this->redirectToRoute('mediopago_show', array('id' => $medioPago->getId()));
        }

        return $this->render('mediopago/new.html.twig', array(
            'medioPago' => $medioPago,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a medioPago entity.
     *
     * @Route("/{id}", name="mediopago_show")
     * @Method("GET")
     */
    public function showAction(MedioPago $medioPago)
    {
        $deleteForm = $this->createDeleteForm($medioPago);

        return $this->render('mediopago/show.html.twig', array(
            'medioPago' => $medioPago,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing medioPago entity.
     *
     * @Route("/{id}/edit", name="mediopago_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MedioPago $medioPago)
    {
        $deleteForm = $this->createDeleteForm($medioPago);
        $editForm = $this->createForm('AppBundle\Form\MedioPagoType', $medioPago);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mediopago_edit', array('id' => $medioPago->getId()));
        }

        return $this->render('mediopago/edit.html.twig', array(
            'medioPago' => $medioPago,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medioPago entity.
     *
     * @Route("/{id}", name="mediopago_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MedioPago $medioPago)
    {
        $form = $this->createDeleteForm($medioPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medioPago);
            $em->flush();
        }

        return $this->redirectToRoute('mediopago_index');
    }

    /**
     * Creates a form to delete a medioPago entity.
     *
     * @param MedioPago $medioPago The medioPago entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MedioPago $medioPago)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mediopago_delete', array('id' => $medioPago->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
