<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contrato;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contrato controller.
 *
 * @Route("contrato")
 */
class ContratoController extends Controller
{
    /**
     * Lists all contrato entities.
     *
     * @Route("/", name="contrato_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contratos = $em->getRepository('AppBundle:Contrato')->findAll();

        return $this->render('contrato/index.html.twig', array(
            'contratos' => $contratos,
        ));
    }

    /**
     * Creates a new contrato entity.
     *
     * @Route("/new", name="contrato_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contrato = new Contrato();
        $form = $this->createForm('AppBundle\Form\ContratoType', $contrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contrato);
            $em->flush();

            return $this->redirectToRoute('contrato_show', array('id' => $contrato->getId()));
        }

        return $this->render('contrato/new.html.twig', array(
            'contrato' => $contrato,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contrato entity.
     *
     * @Route("/{id}", name="contrato_show")
     * @Method("GET")
     */
    public function showAction(Contrato $contrato)
    {
        $deleteForm = $this->createDeleteForm($contrato);

        return $this->render('contrato/show.html.twig', array(
            'contrato' => $contrato,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contrato entity.
     *
     * @Route("/{id}/edit", name="contrato_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Contrato $contrato)
    {
        $deleteForm = $this->createDeleteForm($contrato);
        $editForm = $this->createForm('AppBundle\Form\ContratoType', $contrato);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contrato_edit', array('id' => $contrato->getId()));
        }

        return $this->render('contrato/edit.html.twig', array(
            'contrato' => $contrato,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contrato entity.
     *
     * @Route("/{id}", name="contrato_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Contrato $contrato)
    {
        $form = $this->createDeleteForm($contrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contrato);
            $em->flush();
        }

        return $this->redirectToRoute('contrato_index');
    }

    /**
     * Creates a form to delete a contrato entity.
     *
     * @param Contrato $contrato The contrato entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contrato $contrato)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contrato_delete', array('id' => $contrato->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
