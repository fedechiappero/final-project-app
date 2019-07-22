<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ContactoAlternativo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contactoalternativo controller.
 *
 * @Route("contactoalternativo")
 */
class ContactoAlternativoController extends Controller
{
    /**
     * Lists all contactoAlternativo entities.
     *
     * @Route("/", name="contactoalternativo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contactoAlternativos = $em->getRepository('AppBundle:ContactoAlternativo')->findAll();

        return $this->render('contactoalternativo/index.html.twig', array(
            'contactoAlternativos' => $contactoAlternativos,
        ));
    }

    /**
     * Creates a new contactoAlternativo entity.
     *
     * @Route("/new", name="contactoalternativo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contactoAlternativo = new ContactoAlternativo();
        $form = $this->createForm('AppBundle\Form\ContactoAlternativoType', $contactoAlternativo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactoAlternativo);
            $em->flush();

            return $this->redirectToRoute('contactoalternativo_show', array('id' => $contactoAlternativo->getId()));
        }

        return $this->render('contactoalternativo/new.html.twig', array(
            'contactoAlternativo' => $contactoAlternativo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contactoAlternativo entity.
     *
     * @Route("/{id}", name="contactoalternativo_show")
     * @Method("GET")
     */
    public function showAction(ContactoAlternativo $contactoAlternativo)
    {
        $deleteForm = $this->createDeleteForm($contactoAlternativo);

        return $this->render('contactoalternativo/show.html.twig', array(
            'contactoAlternativo' => $contactoAlternativo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contactoAlternativo entity.
     *
     * @Route("/{id}/edit", name="contactoalternativo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContactoAlternativo $contactoAlternativo)
    {
        $deleteForm = $this->createDeleteForm($contactoAlternativo);
        $editForm = $this->createForm('AppBundle\Form\ContactoAlternativoType', $contactoAlternativo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contactoalternativo_edit', array('id' => $contactoAlternativo->getId()));
        }

        return $this->render('contactoalternativo/edit.html.twig', array(
            'contactoAlternativo' => $contactoAlternativo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contactoAlternativo entity.
     *
     * @Route("/{id}", name="contactoalternativo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ContactoAlternativo $contactoAlternativo)
    {
        $form = $this->createDeleteForm($contactoAlternativo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contactoAlternativo);
            $em->flush();
        }

        return $this->redirectToRoute('contactoalternativo_index');
    }

    /**
     * Creates a form to delete a contactoAlternativo entity.
     *
     * @param ContactoAlternativo $contactoAlternativo The contactoAlternativo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContactoAlternativo $contactoAlternativo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contactoalternativo_delete', array('id' => $contactoAlternativo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
