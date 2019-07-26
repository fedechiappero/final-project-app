<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ContratistaObra;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contratistaobra controller.
 *
 * @Route("contratistaobra")
 */
class ContratistaObraController extends Controller
{
    /**
     * Lists all contratistaObra entities.
     *
     * @Route("/", name="contratistaobra_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("          
            SELECT co.id, co.fechaDesde, co.fechaHasta, c.razonSocial, o.nombre FROM AppBundle:ContratistaObra co,
            AppBundle:Obra o, 
            AppBundle:ContratistaRubro cr ,
            AppBundle:Contratista c 
        ");
        $contratistaObras = $query->getResult();

        return $this->render('contratistaobra/index.html.twig', array(
            'contratistaObras' => $contratistaObras,
        ));
    }

    /**
     * Creates a new contratistaObra entity.
     *
     * @Route("/new", name="contratistaobra_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contratistaObra = new ContratistaObra();
        $form = $this->createForm('AppBundle\Form\ContratistaObraType', $contratistaObra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contratistaObra);
            $em->flush();

            return $this->redirectToRoute('contratistaobra_show', array('id' => $contratistaObra->getId()));
        }

        return $this->render('contratistaobra/new.html.twig', array(
            'contratistaObra' => $contratistaObra,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contratistaObra entity.
     *
     * @Route("/{id}", name="contratistaobra_show")
     * @Method("GET")
     */
    public function showAction(ContratistaObra $contratistaObra)
    {
        $deleteForm = $this->createDeleteForm($contratistaObra);

        $em = $this->getDoctrine()->getManager();

        $dql = "          
            SELECT co.id, co.fechaDesde, co.fechaHasta, c.razonSocial, o.nombre FROM AppBundle:ContratistaObra co,
            AppBundle:Obra o, 
            AppBundle:ContratistaRubro cr ,
            AppBundle:Contratista c 
            WHERE co.idObra = :id
        ";

        $query = $em->createQuery($dql)
            ->setParameter('id', $contratistaObra->getId());

        $contratistaObra = $query->getResult();

        return $this->render('contratistaobra/show.html.twig', array(
            'contratistaObra' => $contratistaObra[0],
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contratistaObra entity.
     *
     * @Route("/{id}/edit", name="contratistaobra_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContratistaObra $contratistaObra)
    {
        $deleteForm = $this->createDeleteForm($contratistaObra);
        $editForm = $this->createForm('AppBundle\Form\ContratistaObraType', $contratistaObra);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contratistaobra_edit', array('id' => $contratistaObra->getId()));
        }

        return $this->render('contratistaobra/edit.html.twig', array(
            'contratistaObra' => $contratistaObra,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contratistaObra entity.
     *
     * @Route("/{id}", name="contratistaobra_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ContratistaObra $contratistaObra)
    {
        $form = $this->createDeleteForm($contratistaObra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contratistaObra);
            $em->flush();
        }

        return $this->redirectToRoute('contratistaobra_index');
    }

    /**
     * Creates a form to delete a contratistaObra entity.
     *
     * @param ContratistaObra $contratistaObra The contratistaObra entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContratistaObra $contratistaObra)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contratistaobra_delete', array('id' => $contratistaObra->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
