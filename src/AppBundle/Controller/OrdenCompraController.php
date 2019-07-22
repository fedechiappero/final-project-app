<?php

namespace AppBundle\Controller;

use AppBundle\Entity\OrdenCompra;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ordencompra controller.
 *
 * @Route("ordencompra")
 */
class OrdenCompraController extends Controller
{
    /**
     * Lists all ordenCompra entities.
     *
     * @Route("/", name="ordencompra_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ordenCompras = $em->getRepository('AppBundle:OrdenCompra')->findAll();

        return $this->render('ordencompra/index.html.twig', array(
            'ordenCompras' => $ordenCompras,
        ));
    }

    /**
     * Creates a new ordenCompra entity.
     *
     * @Route("/new", name="ordencompra_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ordenCompra = new OrdenCompra();
        $form = $this->createForm('AppBundle\Form\OrdenCompraType', $ordenCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ordenCompra);
            $em->flush();

            return $this->redirectToRoute('ordencompra_show', array('id' => $ordenCompra->getId()));
        }

        return $this->render('ordencompra/new.html.twig', array(
            'ordenCompra' => $ordenCompra,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ordenCompra entity.
     *
     * @Route("/{id}", name="ordencompra_show")
     * @Method("GET")
     */
    public function showAction(OrdenCompra $ordenCompra)
    {
        $deleteForm = $this->createDeleteForm($ordenCompra);

        return $this->render('ordencompra/show.html.twig', array(
            'ordenCompra' => $ordenCompra,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ordenCompra entity.
     *
     * @Route("/{id}/edit", name="ordencompra_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OrdenCompra $ordenCompra)
    {
        $deleteForm = $this->createDeleteForm($ordenCompra);
        $editForm = $this->createForm('AppBundle\Form\OrdenCompraType', $ordenCompra);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ordencompra_edit', array('id' => $ordenCompra->getId()));
        }

        return $this->render('ordencompra/edit.html.twig', array(
            'ordenCompra' => $ordenCompra,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ordenCompra entity.
     *
     * @Route("/{id}", name="ordencompra_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OrdenCompra $ordenCompra)
    {
        $form = $this->createDeleteForm($ordenCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ordenCompra);
            $em->flush();
        }

        return $this->redirectToRoute('ordencompra_index');
    }

    /**
     * Creates a form to delete a ordenCompra entity.
     *
     * @param OrdenCompra $ordenCompra The ordenCompra entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OrdenCompra $ordenCompra)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ordencompra_delete', array('id' => $ordenCompra->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
