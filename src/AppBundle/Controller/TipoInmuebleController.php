<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoInmueble;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tipoinmueble controller.
 *
 * @Route("tipoinmueble")
 */
class TipoInmuebleController extends Controller
{
    /**
     * Lists all tipoInmueble entities.
     *
     * @Route("/", name="tipoinmueble_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoInmuebles = $em->getRepository('AppBundle:TipoInmueble')->findAll();

        return $this->render('tipoinmueble/index.html.twig', array(
            'tipoInmuebles' => $tipoInmuebles,
        ));
    }

    /**
     * Creates a new tipoInmueble entity.
     *
     * @Route("/new", name="tipoinmueble_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoInmueble = new TipoInmueble();
        $form = $this->createForm('AppBundle\Form\TipoInmuebleType', $tipoInmueble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoInmueble);
            $em->flush();

            return $this->redirectToRoute('tipoinmueble_show', array('id' => $tipoInmueble->getId()));
        }

        return $this->render('tipoinmueble/new.html.twig', array(
            'tipoInmueble' => $tipoInmueble,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipoInmueble entity.
     *
     * @Route("/{id}", name="tipoinmueble_show")
     * @Method("GET")
     */
    public function showAction(TipoInmueble $tipoInmueble)
    {
        $deleteForm = $this->createDeleteForm($tipoInmueble);

        return $this->render('tipoinmueble/show.html.twig', array(
            'tipoInmueble' => $tipoInmueble,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipoInmueble entity.
     *
     * @Route("/{id}/edit", name="tipoinmueble_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoInmueble $tipoInmueble)
    {
        $deleteForm = $this->createDeleteForm($tipoInmueble);
        $editForm = $this->createForm('AppBundle\Form\TipoInmuebleType', $tipoInmueble);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipoinmueble_edit', array('id' => $tipoInmueble->getId()));
        }

        return $this->render('tipoinmueble/edit.html.twig', array(
            'tipoInmueble' => $tipoInmueble,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipoInmueble entity.
     *
     * @Route("/{id}", name="tipoinmueble_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoInmueble $tipoInmueble)
    {
        $form = $this->createDeleteForm($tipoInmueble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoInmueble);
            $em->flush();
        }

        return $this->redirectToRoute('tipoinmueble_index');
    }

    /**
     * Creates a form to delete a tipoInmueble entity.
     *
     * @param TipoInmueble $tipoInmueble The tipoInmueble entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoInmueble $tipoInmueble)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoinmueble_delete', array('id' => $tipoInmueble->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
