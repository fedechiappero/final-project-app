<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ChequePropio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Chequepropio controller.
 *
 * @Route("chequepropio")
 */
class ChequePropioController extends Controller
{
    /**
     * Lists all chequePropio entities.
     *
     * @Route("/", name="chequepropio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $chequePropios = $em->getRepository('AppBundle:ChequePropio')->findAll();

        return $this->render('chequepropio/index.html.twig', array(
            'chequePropios' => $chequePropios,
        ));
    }

    /**
     * Creates a new chequePropio entity.
     *
     * @Route("/new", name="chequepropio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $chequePropio = new ChequePropio();
        $form = $this->createForm('AppBundle\Form\ChequePropioType', $chequePropio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chequePropio);
            $em->flush();

            return $this->redirectToRoute('chequepropio_show', array('id' => $chequePropio->getId()));
        }

        return $this->render('chequepropio/new.html.twig', array(
            'chequePropio' => $chequePropio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chequePropio entity.
     *
     * @Route("/{id}", name="chequepropio_show")
     * @Method("GET")
     */
    public function showAction(ChequePropio $chequePropio)
    {
        $deleteForm = $this->createDeleteForm($chequePropio);

        return $this->render('chequepropio/show.html.twig', array(
            'chequePropio' => $chequePropio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chequePropio entity.
     *
     * @Route("/{id}/edit", name="chequepropio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ChequePropio $chequePropio)
    {
        $deleteForm = $this->createDeleteForm($chequePropio);
        $editForm = $this->createForm('AppBundle\Form\ChequePropioType', $chequePropio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chequepropio_edit', array('id' => $chequePropio->getId()));
        }

        return $this->render('chequepropio/edit.html.twig', array(
            'chequePropio' => $chequePropio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chequePropio entity.
     *
     * @Route("/{id}", name="chequepropio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ChequePropio $chequePropio)
    {
        $form = $this->createDeleteForm($chequePropio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chequePropio);
            $em->flush();
        }

        return $this->redirectToRoute('chequepropio_index');
    }

    /**
     * Creates a form to delete a chequePropio entity.
     *
     * @param ChequePropio $chequePropio The chequePropio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ChequePropio $chequePropio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chequepropio_delete', array('id' => $chequePropio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
