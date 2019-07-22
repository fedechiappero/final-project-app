<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CuentaBanco;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cuentabanco controller.
 *
 * @Route("cuentabanco")
 */
class CuentaBancoController extends Controller
{
    /**
     * Lists all cuentaBanco entities.
     *
     * @Route("/", name="cuentabanco_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cuentaBancos = $em->getRepository('AppBundle:CuentaBanco')->findAll();

        return $this->render('cuentabanco/index.html.twig', array(
            'cuentaBancos' => $cuentaBancos,
        ));
    }

    /**
     * Creates a new cuentaBanco entity.
     *
     * @Route("/new", name="cuentabanco_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cuentaBanco = new CuentaBanco();
        $form = $this->createForm('AppBundle\Form\CuentaBancoType', $cuentaBanco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cuentaBanco);
            $em->flush();

            return $this->redirectToRoute('cuentabanco_show', array('id' => $cuentaBanco->getId()));
        }

        return $this->render('cuentabanco/new.html.twig', array(
            'cuentaBanco' => $cuentaBanco,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cuentaBanco entity.
     *
     * @Route("/{id}", name="cuentabanco_show")
     * @Method("GET")
     */
    public function showAction(CuentaBanco $cuentaBanco)
    {
        $deleteForm = $this->createDeleteForm($cuentaBanco);

        return $this->render('cuentabanco/show.html.twig', array(
            'cuentaBanco' => $cuentaBanco,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cuentaBanco entity.
     *
     * @Route("/{id}/edit", name="cuentabanco_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CuentaBanco $cuentaBanco)
    {
        $deleteForm = $this->createDeleteForm($cuentaBanco);
        $editForm = $this->createForm('AppBundle\Form\CuentaBancoType', $cuentaBanco);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cuentabanco_edit', array('id' => $cuentaBanco->getId()));
        }

        return $this->render('cuentabanco/edit.html.twig', array(
            'cuentaBanco' => $cuentaBanco,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cuentaBanco entity.
     *
     * @Route("/{id}", name="cuentabanco_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CuentaBanco $cuentaBanco)
    {
        $form = $this->createDeleteForm($cuentaBanco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cuentaBanco);
            $em->flush();
        }

        return $this->redirectToRoute('cuentabanco_index');
    }

    /**
     * Creates a form to delete a cuentaBanco entity.
     *
     * @param CuentaBanco $cuentaBanco The cuentaBanco entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CuentaBanco $cuentaBanco)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cuentabanco_delete', array('id' => $cuentaBanco->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
