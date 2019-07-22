<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Salida;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Salida controller.
 *
 * @Route("salida")
 */
class SalidaController extends Controller
{
    /**
     * Lists all salida entities.
     *
     * @Route("/", name="salida_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $salidas = $em->getRepository('AppBundle:Salida')->findAll();

        return $this->render('salida/index.html.twig', array(
            'salidas' => $salidas,
        ));
    }

    /**
     * Creates a new salida entity.
     *
     * @Route("/new", name="salida_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $salida = new Salida();
        $form = $this->createForm('AppBundle\Form\SalidaType', $salida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salida);
            $em->flush();

            return $this->redirectToRoute('salida_show', array('id' => $salida->getId()));
        }

        return $this->render('salida/new.html.twig', array(
            'salida' => $salida,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a salida entity.
     *
     * @Route("/{id}", name="salida_show")
     * @Method("GET")
     */
    public function showAction(Salida $salida)
    {
        $deleteForm = $this->createDeleteForm($salida);

        return $this->render('salida/show.html.twig', array(
            'salida' => $salida,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing salida entity.
     *
     * @Route("/{id}/edit", name="salida_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Salida $salida)
    {
        $deleteForm = $this->createDeleteForm($salida);
        $editForm = $this->createForm('AppBundle\Form\SalidaType', $salida);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salida_edit', array('id' => $salida->getId()));
        }

        return $this->render('salida/edit.html.twig', array(
            'salida' => $salida,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a salida entity.
     *
     * @Route("/{id}", name="salida_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Salida $salida)
    {
        $form = $this->createDeleteForm($salida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($salida);
            $em->flush();
        }

        return $this->redirectToRoute('salida_index');
    }

    /**
     * Creates a form to delete a salida entity.
     *
     * @param Salida $salida The salida entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Salida $salida)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('salida_delete', array('id' => $salida->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
