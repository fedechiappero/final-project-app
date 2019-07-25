<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ContratistaRubro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contratistarubro controller.
 *
 * @Route("contratistarubro")
 */
class ContratistaRubroController extends Controller
{
    /**
     * Lists all contratistaRubro entities.
     *
     * @Route("/", name="contratistarubro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$contratistaRubros = $em->getRepository('AppBundle:ContratistaRubro')->findAll();

        $query = $em->createQuery("          
            SELECT cr.id, r.nombre AS rubro, c.razonSocial FROM AppBundle:ContratistaRubro cr
            INNER JOIN AppBundle:Rubro r WITH cr.idRubro = r.id
            INNER JOIN AppBundle:Contratista c WITH cr.idContratista = c.id
        ");
        $contratistaRubros = $query->getResult();

        return $this->render('contratistarubro/index.html.twig', array(
            'contratistaRubros' => $contratistaRubros,
        ));
    }

    /**
     * Creates a new contratistaRubro entity.
     *
     * @Route("/new", name="contratistarubro_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contratistaRubro = new ContratistaRubro();
        $form = $this->createForm('AppBundle\Form\ContratistaRubroType', $contratistaRubro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contratistaRubro);
            $em->flush();

            return $this->redirectToRoute('contratistarubro_show', array('id' => $contratistaRubro->getId()));
        }

        return $this->render('contratistarubro/new.html.twig', array(
            'contratistaRubro' => $contratistaRubro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contratistaRubro entity.
     *
     * @Route("/{id}", name="contratistarubro_show")
     * @Method("GET")
     */
    public function showAction(ContratistaRubro $contratistaRubro)
    {
        $deleteForm = $this->createDeleteForm($contratistaRubro);

        $em = $this->getDoctrine()->getManager();

        $dql ="          
            SELECT cr.id, r.nombre, c.razonSocial FROM AppBundle:ContratistaRubro cr
            INNER JOIN AppBundle:Rubro r WITH cr.idRubro = r.id
            INNER JOIN AppBundle:Contratista c WITH cr.idContratista = c.id
            WHERE cr.id = :id
        ";

        $query = $em->createQuery($dql)
            ->setParameter('id', $contratistaRubro->getId());

        $contratistaRubro = $query->getResult();

        return $this->render('contratistarubro/show.html.twig', array(
            'contratistaRubro' => $contratistaRubro[0],
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contratistaRubro entity.
     *
     * @Route("/{id}/edit", name="contratistarubro_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContratistaRubro $contratistaRubro)
    {
        $deleteForm = $this->createDeleteForm($contratistaRubro);
        $editForm = $this->createForm('AppBundle\Form\ContratistaRubroType', $contratistaRubro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contratistarubro_edit', array('id' => $contratistaRubro->getId()));
        }

        return $this->render('contratistarubro/edit.html.twig', array(
            'contratistaRubro' => $contratistaRubro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contratistaRubro entity.
     *
     * @Route("/{id}", name="contratistarubro_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ContratistaRubro $contratistaRubro)
    {
        $form = $this->createDeleteForm($contratistaRubro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contratistaRubro);
            $em->flush();
        }

        return $this->redirectToRoute('contratistarubro_index');
    }

    /**
     * Creates a form to delete a contratistaRubro entity.
     *
     * @param ContratistaRubro $contratistaRubro The contratistaRubro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContratistaRubro $contratistaRubro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contratistarubro_delete', array('id' => $contratistaRubro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
