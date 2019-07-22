<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ComprobanteProveedor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comprobanteproveedor controller.
 *
 * @Route("comprobanteproveedor")
 */
class ComprobanteProveedorController extends Controller
{
    /**
     * Lists all comprobanteProveedor entities.
     *
     * @Route("/", name="comprobanteproveedor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comprobanteProveedors = $em->getRepository('AppBundle:ComprobanteProveedor')->findAll();

        return $this->render('comprobanteproveedor/index.html.twig', array(
            'comprobanteProveedors' => $comprobanteProveedors,
        ));
    }

    /**
     * Creates a new comprobanteProveedor entity.
     *
     * @Route("/new", name="comprobanteproveedor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comprobanteProveedor = new ComprobanteProveedor();
        $form = $this->createForm('AppBundle\Form\ComprobanteProveedorType', $comprobanteProveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comprobanteProveedor);
            $em->flush();

            return $this->redirectToRoute('comprobanteproveedor_show', array('id' => $comprobanteProveedor->getId()));
        }

        return $this->render('comprobanteproveedor/new.html.twig', array(
            'comprobanteProveedor' => $comprobanteProveedor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comprobanteProveedor entity.
     *
     * @Route("/{id}", name="comprobanteproveedor_show")
     * @Method("GET")
     */
    public function showAction(ComprobanteProveedor $comprobanteProveedor)
    {
        $deleteForm = $this->createDeleteForm($comprobanteProveedor);

        return $this->render('comprobanteproveedor/show.html.twig', array(
            'comprobanteProveedor' => $comprobanteProveedor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comprobanteProveedor entity.
     *
     * @Route("/{id}/edit", name="comprobanteproveedor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ComprobanteProveedor $comprobanteProveedor)
    {
        $deleteForm = $this->createDeleteForm($comprobanteProveedor);
        $editForm = $this->createForm('AppBundle\Form\ComprobanteProveedorType', $comprobanteProveedor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comprobanteproveedor_edit', array('id' => $comprobanteProveedor->getId()));
        }

        return $this->render('comprobanteproveedor/edit.html.twig', array(
            'comprobanteProveedor' => $comprobanteProveedor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comprobanteProveedor entity.
     *
     * @Route("/{id}", name="comprobanteproveedor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ComprobanteProveedor $comprobanteProveedor)
    {
        $form = $this->createDeleteForm($comprobanteProveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comprobanteProveedor);
            $em->flush();
        }

        return $this->redirectToRoute('comprobanteproveedor_index');
    }

    /**
     * Creates a form to delete a comprobanteProveedor entity.
     *
     * @param ComprobanteProveedor $comprobanteProveedor The comprobanteProveedor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ComprobanteProveedor $comprobanteProveedor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comprobanteproveedor_delete', array('id' => $comprobanteProveedor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
