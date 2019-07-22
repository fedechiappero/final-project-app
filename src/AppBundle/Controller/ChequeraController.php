<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Chequera;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Chequera controller.
 *
 * @Route("chequera")
 */
class ChequeraController extends Controller
{
    /**
     * Lists all chequera entities.
     *
     * @Route("/", name="chequera_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $chequeras = $em->getRepository('AppBundle:Chequera')->findAll();

        return $this->render('chequera/index.html.twig', array(
            'chequeras' => $chequeras,
        ));
    }

    /**
     * Creates a new chequera entity.
     *
     * @Route("/new", name="chequera_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $chequera = new Chequera();
        $form = $this->createForm('AppBundle\Form\ChequeraType', $chequera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chequera);
            $em->flush();

            return $this->redirectToRoute('chequera_show', array('id' => $chequera->getId()));
        }

        return $this->render('chequera/new.html.twig', array(
            'chequera' => $chequera,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chequera entity.
     *
     * @Route("/{id}", name="chequera_show")
     * @Method("GET")
     */
    public function showAction(Chequera $chequera)
    {
        $deleteForm = $this->createDeleteForm($chequera);

        return $this->render('chequera/show.html.twig', array(
            'chequera' => $chequera,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chequera entity.
     *
     * @Route("/{id}/edit", name="chequera_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Chequera $chequera)
    {
        $deleteForm = $this->createDeleteForm($chequera);
        $editForm = $this->createForm('AppBundle\Form\ChequeraType', $chequera);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chequera_edit', array('id' => $chequera->getId()));
        }

        return $this->render('chequera/edit.html.twig', array(
            'chequera' => $chequera,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chequera entity.
     *
     * @Route("/{id}", name="chequera_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Chequera $chequera)
    {
        $form = $this->createDeleteForm($chequera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chequera);
            $em->flush();
        }

        return $this->redirectToRoute('chequera_index');
    }

    /**
     * Creates a form to delete a chequera entity.
     *
     * @param Chequera $chequera The chequera entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Chequera $chequera)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chequera_delete', array('id' => $chequera->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
