<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contratista;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contratista controller.
 *
 * @Route("contratista")
 */
class ContratistaController extends Controller
{
    /**
     * Lists all contratista entities.
     *
     * @Route("/", name="contratista_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contratistas = $em->getRepository('AppBundle:Contratista')->findAll();

        return $this->render('contratista/index.html.twig', array(
            'contratistas' => $contratistas,
        ));
    }

    /**
     * Creates a new contratista entity.
     *
     * @Route("/new", name="contratista_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contratista = new Contratista();
        $form = $this->createForm('AppBundle\Form\ContratistaType', $contratista);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contratista);
            $em->flush();

            return $this->redirectToRoute('contratista_show', array('id' => $contratista->getId()));
        }

        return $this->render('contratista/new.html.twig', array(
            'contratista' => $contratista,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contratista entity.
     *
     * @Route("/{id}", name="contratista_show")
     * @Method("GET")
     */
    public function showAction(Contratista $contratista)
    {
        $deleteForm = $this->createDeleteForm($contratista);

        return $this->render('contratista/show.html.twig', array(
            'contratista' => $contratista,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contratista entity.
     *
     * @Route("/{id}/edit", name="contratista_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Contratista $contratista)
    {
        $deleteForm = $this->createDeleteForm($contratista);
        $editForm = $this->createForm('AppBundle\Form\ContratistaType', $contratista);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contratista_edit', array('id' => $contratista->getId()));
        }

        return $this->render('contratista/edit.html.twig', array(
            'contratista' => $contratista,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contratista entity.
     *
     * @Route("/{id}", name="contratista_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Contratista $contratista)
    {
        $form = $this->createDeleteForm($contratista);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contratista);
            $em->flush();
        }

        return $this->redirectToRoute('contratista_index');
    }

    /**
     * Creates a form to delete a contratista entity.
     *
     * @param Contratista $contratistum The contratistum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contratista $contratista)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contratista_delete', array('id' => $contratista->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
