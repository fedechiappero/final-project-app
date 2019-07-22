<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Venta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Venta controller.
 *
 * @Route("venta")
 */
class VentaController extends Controller
{
    /**
     * Lists all venta entities.
     *
     * @Route("/", name="venta_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ventas = $em->getRepository('AppBundle:Venta')->findAll();

        return $this->render('venta/index.html.twig', array(
            'ventas' => $ventas,
        ));
    }

    /**
     * Creates a new venta entity.
     *
     * @Route("/new", name="venta_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $venta = new Venta();
        $form = $this->createForm('AppBundle\Form\VentaType', $venta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($venta);
            $em->flush();

            return $this->redirectToRoute('venta_show', array('id' => $venta->getId()));
        }

        return $this->render('venta/new.html.twig', array(
            'venta' => $venta,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a venta entity.
     *
     * @Route("/{id}", name="venta_show")
     * @Method("GET")
     */
    public function showAction(Venta $venta)
    {
        $deleteForm = $this->createDeleteForm($venta);

        return $this->render('venta/show.html.twig', array(
            'venta' => $venta,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing venta entity.
     *
     * @Route("/{id}/edit", name="venta_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Venta $venta)
    {
        $deleteForm = $this->createDeleteForm($venta);
        $editForm = $this->createForm('AppBundle\Form\VentaType', $venta);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('venta_edit', array('id' => $venta->getId()));
        }

        return $this->render('venta/edit.html.twig', array(
            'venta' => $venta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a venta entity.
     *
     * @Route("/{id}", name="venta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Venta $venta)
    {
        $form = $this->createDeleteForm($venta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($venta);
            $em->flush();
        }

        return $this->redirectToRoute('venta_index');
    }

    /**
     * Creates a form to delete a venta entity.
     *
     * @param Venta $ventum The ventum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Venta $venta)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('venta_delete', array('id' => $venta->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
