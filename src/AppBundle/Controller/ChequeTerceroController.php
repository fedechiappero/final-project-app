<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ChequeTercero;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Chequetercero controller.
 *
 * @Route("chequetercero")
 */
class ChequeTerceroController extends Controller
{
    /**
     * Lists all chequeTercero entities.
     *
     * @Route("/", name="chequetercero_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $chequeTerceros = $em->getRepository('AppBundle:ChequeTercero')->findAll();

        return $this->render('chequetercero/index.html.twig', array(
            'chequeTerceros' => $chequeTerceros,
        ));
    }

    /**
     * Creates a new chequeTercero entity.
     *
     * @Route("/new", name="chequetercero_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $chequeTercero = new ChequeTercero();
        $form = $this->createForm('AppBundle\Form\ChequeTerceroType', $chequeTercero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chequeTercero);
            $em->flush();

            return $this->redirectToRoute('chequetercero_show', array('id' => $chequeTercero->getId()));
        }

        return $this->render('chequetercero/new.html.twig', array(
            'chequeTercero' => $chequeTercero,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chequeTercero entity.
     *
     * @Route("/{id}", name="chequetercero_show")
     * @Method("GET")
     */
    public function showAction(ChequeTercero $chequeTercero)
    {
        $deleteForm = $this->createDeleteForm($chequeTercero);

        return $this->render('chequetercero/show.html.twig', array(
            'chequeTercero' => $chequeTercero,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chequeTercero entity.
     *
     * @Route("/{id}/edit", name="chequetercero_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ChequeTercero $chequeTercero)
    {
        $deleteForm = $this->createDeleteForm($chequeTercero);
        $editForm = $this->createForm('AppBundle\Form\ChequeTerceroType', $chequeTercero);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chequetercero_edit', array('id' => $chequeTercero->getId()));
        }

        return $this->render('chequetercero/edit.html.twig', array(
            'chequeTercero' => $chequeTercero,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chequeTercero entity.
     *
     * @Route("/{id}", name="chequetercero_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ChequeTercero $chequeTercero)
    {
        $form = $this->createDeleteForm($chequeTercero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chequeTercero);
            $em->flush();
        }

        return $this->redirectToRoute('chequetercero_index');
    }

    /**
     * Creates a form to delete a chequeTercero entity.
     *
     * @param ChequeTercero $chequeTercero The chequeTercero entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ChequeTercero $chequeTercero)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chequetercero_delete', array('id' => $chequeTercero->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
