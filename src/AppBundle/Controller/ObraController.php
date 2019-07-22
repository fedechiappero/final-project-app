<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Obra;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Obra controller.
 *
 * @Route("obra")
 */
class ObraController extends Controller
{
    /**
     * Lists all obra entities.
     *
     * @Route("/", name="obra_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $obras = $em->getRepository('AppBundle:Obra')->findAll();

        return $this->render('obra/index.html.twig', array(
            'obras' => $obras,
        ));
    }

    /**
     * Creates a new obra entity.
     *
     * @Route("/new", name="obra_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $obra = new Obra();
        $form = $this->createForm('AppBundle\Form\ObraType', $obra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($obra);
            $em->flush();

            return $this->redirectToRoute('obra_show', array('id' => $obra->getId()));
        }

        return $this->render('obra/new.html.twig', array(
            'obra' => $obra,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a obra entity.
     *
     * @Route("/{id}", name="obra_show")
     * @Method("GET")
     */
    public function showAction(Obra $obra)
    {
        $deleteForm = $this->createDeleteForm($obra);

        return $this->render('obra/show.html.twig', array(
            'obra' => $obra,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing obra entity.
     *
     * @Route("/{id}/edit", name="obra_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Obra $obra)
    {
        $deleteForm = $this->createDeleteForm($obra);
        $editForm = $this->createForm('AppBundle\Form\ObraType', $obra);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('obra_edit', array('id' => $obra->getId()));
        }

        return $this->render('obra/edit.html.twig', array(
            'obra' => $obra,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a obra entity.
     *
     * @Route("/{id}", name="obra_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Obra $obra)
    {
        $form = $this->createDeleteForm($obra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($obra);
            $em->flush();
        }

        return $this->redirectToRoute('obra_index');
    }

    /**
     * Creates a form to delete a obra entity.
     *
     * @param Obra $obra The obra entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Obra $obra)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('obra_delete', array('id' => $obra->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
