<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Caducidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Caducidad controller.
 *
 * @Route("caducidad")
 */
class CaducidadController extends Controller
{
    /**
     * Lists all caducidad entities.
     *
     * @Route("/", name="caducidad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $caducidads = $em->getRepository('AppBundle:Caducidad')->findAll();

        return $this->render('caducidad/index.html.twig', array(
            'caducidads' => $caducidads,
        ));
    }

    /**
     * Creates a new caducidad entity.
     *
     * @Route("/new", name="caducidad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $caducidad = new Caducidad();
        $form = $this->createForm('AppBundle\Form\CaducidadType', $caducidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($caducidad);
            $em->flush();

            return $this->redirectToRoute('caducidad_show', array('id' => $caducidad->getId()));
        }

        return $this->render('caducidad/new.html.twig', array(
            'caducidad' => $caducidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a caducidad entity.
     *
     * @Route("/{id}", name="caducidad_show")
     * @Method("GET")
     */
    public function showAction(Caducidad $caducidad)
    {
        $deleteForm = $this->createDeleteForm($caducidad);

        return $this->render('caducidad/show.html.twig', array(
            'caducidad' => $caducidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing caducidad entity.
     *
     * @Route("/{id}/edit", name="caducidad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Caducidad $caducidad)
    {
        $deleteForm = $this->createDeleteForm($caducidad);
        $editForm = $this->createForm('AppBundle\Form\CaducidadType', $caducidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('caducidad_edit', array('id' => $caducidad->getId()));
        }

        return $this->render('caducidad/edit.html.twig', array(
            'caducidad' => $caducidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a caducidad entity.
     *
     * @Route("/{id}", name="caducidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Caducidad $caducidad)
    {
        $form = $this->createDeleteForm($caducidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($caducidad);
            $em->flush();
        }

        return $this->redirectToRoute('caducidad_index');
    }

    /**
     * Creates a form to delete a caducidad entity.
     *
     * @param Caducidad $caducidad The caducidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Caducidad $caducidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('caducidad_delete', array('id' => $caducidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
