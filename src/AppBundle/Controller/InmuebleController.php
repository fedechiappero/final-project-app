<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Inmueble;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Inmueble controller.
 *
 * @Route("inmueble")
 */
class InmuebleController extends Controller
{
    /**
     * Lists all inmueble entities.
     *
     * @Route("/", name="inmueble_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $inmuebles = $em->getRepository('AppBundle:Inmueble')->findAll();

        return $this->render('inmueble/index.html.twig', array(
            'inmuebles' => $inmuebles,
        ));
    }

    /**
     * Creates a new inmueble entity.
     *
     * @Route("/new", name="inmueble_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $inmueble = new Inmueble();
        $form = $this->createForm('AppBundle\Form\InmuebleType', $inmueble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inmueble);
            $em->flush();

            return $this->redirectToRoute('inmueble_show', array('id' => $inmueble->getId()));
        }

        return $this->render('inmueble/new.html.twig', array(
            'inmueble' => $inmueble,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a inmueble entity.
     *
     * @Route("/{id}", name="inmueble_show")
     * @Method("GET")
     */
    public function showAction(Inmueble $inmueble)
    {
        $deleteForm = $this->createDeleteForm($inmueble);

        return $this->render('inmueble/show.html.twig', array(
            'inmueble' => $inmueble,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing inmueble entity.
     *
     * @Route("/{id}/edit", name="inmueble_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Inmueble $inmueble)
    {
        $deleteForm = $this->createDeleteForm($inmueble);
        $editForm = $this->createForm('AppBundle\Form\InmuebleType', $inmueble);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inmueble_edit', array('id' => $inmueble->getId()));
        }

        return $this->render('inmueble/edit.html.twig', array(
            'inmueble' => $inmueble,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a inmueble entity.
     *
     * @Route("/{id}", name="inmueble_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Inmueble $inmueble)
    {
        $form = $this->createDeleteForm($inmueble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($inmueble);
            $em->flush();
        }

        return $this->redirectToRoute('inmueble_index');
    }

    /**
     * Creates a form to delete a inmueble entity.
     *
     * @param Inmueble $inmueble The inmueble entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Inmueble $inmueble)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inmueble_delete', array('id' => $inmueble->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
