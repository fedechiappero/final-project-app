<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ObraFinalizacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Obrafinalizacion controller.
 *
 * @Route("obrafinalizacion")
 */
class ObraFinalizacionController extends Controller
{
    /**
     * Lists all obraFinalizacion entities.
     *
     * @Route("/", name="obrafinalizacion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $obraFinalizacions = $em->getRepository('AppBundle:ObraFinalizacion')->findAll();

        return $this->render('obrafinalizacion/index.html.twig', array(
            'obraFinalizacions' => $obraFinalizacions,
        ));
    }

    /**
     * Creates a new obraFinalizacion entity.
     *
     * @Route("/new", name="obrafinalizacion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $obraFinalizacion = new ObraFinalizacion();
        $form = $this->createForm('AppBundle\Form\ObraFinalizacionType', $obraFinalizacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($obraFinalizacion);
            $em->flush();

            return $this->redirectToRoute('obrafinalizacion_show', array('id' => $obraFinalizacion->getId()));
        }

        return $this->render('obrafinalizacion/new.html.twig', array(
            'obraFinalizacion' => $obraFinalizacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a obraFinalizacion entity.
     *
     * @Route("/{id}", name="obrafinalizacion_show")
     * @Method("GET")
     */
    public function showAction(ObraFinalizacion $obraFinalizacion)
    {
        $deleteForm = $this->createDeleteForm($obraFinalizacion);

        return $this->render('obrafinalizacion/show.html.twig', array(
            'obraFinalizacion' => $obraFinalizacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing obraFinalizacion entity.
     *
     * @Route("/{id}/edit", name="obrafinalizacion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ObraFinalizacion $obraFinalizacion)
    {
        $deleteForm = $this->createDeleteForm($obraFinalizacion);
        $editForm = $this->createForm('AppBundle\Form\ObraFinalizacionType', $obraFinalizacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('obrafinalizacion_edit', array('id' => $obraFinalizacion->getId()));
        }

        return $this->render('obrafinalizacion/edit.html.twig', array(
            'obraFinalizacion' => $obraFinalizacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a obraFinalizacion entity.
     *
     * @Route("/{id}", name="obrafinalizacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ObraFinalizacion $obraFinalizacion)
    {
        $form = $this->createDeleteForm($obraFinalizacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($obraFinalizacion);
            $em->flush();
        }

        return $this->redirectToRoute('obrafinalizacion_index');
    }

    /**
     * Creates a form to delete a obraFinalizacion entity.
     *
     * @param ObraFinalizacion $obraFinalizacion The obraFinalizacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ObraFinalizacion $obraFinalizacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('obrafinalizacion_delete', array('id' => $obraFinalizacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
