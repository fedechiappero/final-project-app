<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Remito;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Remito controller.
 *
 * @Route("remito")
 */
class RemitoController extends Controller
{
    /**
     * Lists all remito entities.
     *
     * @Route("/", name="remito_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $remitos = $em->getRepository('AppBundle:Remito')->findAll();

        return $this->render('remito/index.html.twig', array(
            'remitos' => $remitos,
        ));
    }

    /**
     * Creates a new remito entity.
     *
     * @Route("/new", name="remito_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $remito = new Remito();
        $form = $this->createForm('AppBundle\Form\RemitoType', $remito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($remito);
            $em->flush();

            return $this->redirectToRoute('remito_show', array('id' => $remito->getId()));
        }

        return $this->render('remito/new.html.twig', array(
            'remito' => $remito,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a remito entity.
     *
     * @Route("/{id}", name="remito_show")
     * @Method("GET")
     */
    public function showAction(Remito $remito)
    {
        $deleteForm = $this->createDeleteForm($remito);

        return $this->render('remito/show.html.twig', array(
            'remito' => $remito,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing remito entity.
     *
     * @Route("/{id}/edit", name="remito_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Remito $remito)
    {
        $deleteForm = $this->createDeleteForm($remito);
        $editForm = $this->createForm('AppBundle\Form\RemitoType', $remito);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('remito_edit', array('id' => $remito->getId()));
        }

        return $this->render('remito/edit.html.twig', array(
            'remito' => $remito,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a remito entity.
     *
     * @Route("/{id}", name="remito_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Remito $remito)
    {
        $form = $this->createDeleteForm($remito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($remito);
            $em->flush();
        }

        return $this->redirectToRoute('remito_index');
    }

    /**
     * Creates a form to delete a remito entity.
     *
     * @param Remito $remito The remito entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Remito $remito)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('remito_delete', array('id' => $remito->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
