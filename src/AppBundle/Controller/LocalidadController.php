<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Localidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Localidad controller.
 *
 * @Route("localidad")
 */
class LocalidadController extends Controller
{
    /**
     * Lists all localidad entities.
     *
     * @Route("/", name="localidad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $localidads = $em->getRepository('AppBundle:Localidad')->findAll();

        return $this->render('localidad/index.html.twig', array(
            'localidads' => $localidads,
        ));
    }

    /**
     * Creates a new localidad entity.
     *
     * @Route("/new", name="localidad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $localidad = new Localidad();
        $form = $this->createForm('AppBundle\Form\LocalidadType', $localidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localidad);
            $em->flush();

            return $this->redirectToRoute('localidad_show', array('id' => $localidad->getId()));
        }

        return $this->render('localidad/new.html.twig', array(
            'localidad' => $localidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a localidad entity.
     *
     * @Route("/{id}", name="localidad_show")
     * @Method("GET")
     */
    public function showAction(Localidad $localidad)
    {
        $deleteForm = $this->createDeleteForm($localidad);

        return $this->render('localidad/show.html.twig', array(
            'localidad' => $localidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing localidad entity.
     *
     * @Route("/{id}/edit", name="localidad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Localidad $localidad)
    {
        $deleteForm = $this->createDeleteForm($localidad);
        $editForm = $this->createForm('AppBundle\Form\LocalidadType', $localidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('localidad_edit', array('id' => $localidad->getId()));
        }

        return $this->render('localidad/edit.html.twig', array(
            'localidad' => $localidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a localidad entity.
     *
     * @Route("/{id}", name="localidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Localidad $localidad)
    {
        $form = $this->createDeleteForm($localidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($localidad);
            $em->flush();
        }

        return $this->redirectToRoute('localidad_index');
    }

    /**
     * Creates a form to delete a localidad entity.
     *
     * @param Localidad $localidad The localidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Localidad $localidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('localidad_delete', array('id' => $localidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
