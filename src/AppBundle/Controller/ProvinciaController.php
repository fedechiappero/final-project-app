<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Provincia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provincia controller.
 *
 * @Route("provincia")
 */
class ProvinciaController extends Controller
{
    /**
     * Lists all provincia entities.
     *
     * @Route("/", name="provincia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $provincias = $em->getRepository('AppBundle:Provincia')->findAll();

        return $this->render('provincia/index.html.twig', array(
            'provincias' => $provincias,
        ));
    }

    /**
     * Creates a new provincia entity.
     *
     * @Route("/new", name="provincia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $provincia = new Provincia();
        $form = $this->createForm('AppBundle\Form\ProvinciaType', $provincia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($provincia);
            $em->flush();

            return $this->redirectToRoute('provincia_show', array('id' => $provincia->getId()));
        }

        return $this->render('provincia/new.html.twig', array(
            'provincia' => $provincia,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a provincia entity.
     *
     * @Route("/{id}", name="provincia_show")
     * @Method("GET")
     */
    public function showAction(Provincia $provincia)
    {
        $deleteForm = $this->createDeleteForm($provincia);

        return $this->render('provincia/show.html.twig', array(
            'provincia' => $provincia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing provincia entity.
     *
     * @Route("/{id}/edit", name="provincia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Provincia $provincia)
    {
        $deleteForm = $this->createDeleteForm($provincia);
        $editForm = $this->createForm('AppBundle\Form\ProvinciaType', $provincia);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('provincia_edit', array('id' => $provincia->getId()));
        }

        return $this->render('provincia/edit.html.twig', array(
            'provincia' => $provincia,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a provincia entity.
     *
     * @Route("/{id}", name="provincia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Provincia $provincia)
    {
        $form = $this->createDeleteForm($provincia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($provincia);
            $em->flush();
        }

        return $this->redirectToRoute('provincia_index');
    }

    /**
     * Creates a form to delete a provincia entity.
     *
     * @param Provincia $provincium The provincium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Provincia $provincia)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('provincia_delete', array('id' => $provincia->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
