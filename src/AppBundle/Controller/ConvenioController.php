<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Convenio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Convenio controller.
 *
 * @Route("convenio")
 */
class ConvenioController extends Controller
{
    /**
     * Lists all convenio entities.
     *
     * @Route("/", name="convenio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $convenios = $em->getRepository('AppBundle:Convenio')->findAll();

        return $this->render('convenio/index.html.twig', array(
            'convenios' => $convenios,
        ));
    }

    /**
     * Creates a new convenio entity.
     *
     * @Route("/new", name="convenio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $convenio = new Convenio();
        $form = $this->createForm('AppBundle\Form\ConvenioType', $convenio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($convenio);
            $em->flush();

            return $this->redirectToRoute('convenio_show', array('id' => $convenio->getId()));
        }

        return $this->render('convenio/new.html.twig', array(
            'convenio' => $convenio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a convenio entity.
     *
     * @Route("/{id}", name="convenio_show")
     * @Method("GET")
     */
    public function showAction(Convenio $convenio)
    {
        $deleteForm = $this->createDeleteForm($convenio);

        return $this->render('convenio/show.html.twig', array(
            'convenio' => $convenio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing convenio entity.
     *
     * @Route("/{id}/edit", name="convenio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Convenio $convenio)
    {
        $deleteForm = $this->createDeleteForm($convenio);
        $editForm = $this->createForm('AppBundle\Form\ConvenioType', $convenio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('convenio_edit', array('id' => $convenio->getId()));
        }

        return $this->render('convenio/edit.html.twig', array(
            'convenio' => $convenio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a convenio entity.
     *
     * @Route("/{id}", name="convenio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Convenio $convenio)
    {
        $form = $this->createDeleteForm($convenio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($convenio);
            $em->flush();
        }

        return $this->redirectToRoute('convenio_index');
    }

    /**
     * Creates a form to delete a convenio entity.
     *
     * @param Convenio $convenio The convenio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Convenio $convenio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('convenio_delete', array('id' => $convenio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
