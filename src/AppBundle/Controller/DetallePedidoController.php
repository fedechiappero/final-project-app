<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetallePedido;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Detallepedido controller.
 *
 * @Route("detallepedido")
 */
class DetallePedidoController extends Controller
{
    /**
     * Lists all detallePedido entities.
     *
     * @Route("/", name="detallepedido_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detallePedidos = $em->getRepository('AppBundle:DetallePedido')->findAll();

        return $this->render('detallepedido/index.html.twig', array(
            'detallePedidos' => $detallePedidos,
        ));
    }

    /**
     * Creates a new detallePedido entity.
     *
     * @Route("/new", name="detallepedido_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detallePedido = new DetallePedido();
        $form = $this->createForm('AppBundle\Form\DetallePedidoType', $detallePedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detallePedido);
            $em->flush();

            return $this->redirectToRoute('detallepedido_show', array('id' => $detallePedido->getId()));
        }

        return $this->render('detallepedido/new.html.twig', array(
            'detallePedido' => $detallePedido,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detallePedido entity.
     *
     * @Route("/{id}", name="detallepedido_show")
     * @Method("GET")
     */
    public function showAction(DetallePedido $detallePedido)
    {
        $deleteForm = $this->createDeleteForm($detallePedido);

        return $this->render('detallepedido/show.html.twig', array(
            'detallePedido' => $detallePedido,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detallePedido entity.
     *
     * @Route("/{id}/edit", name="detallepedido_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DetallePedido $detallePedido)
    {
        $deleteForm = $this->createDeleteForm($detallePedido);
        $editForm = $this->createForm('AppBundle\Form\DetallePedidoType', $detallePedido);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detallepedido_edit', array('id' => $detallePedido->getId()));
        }

        return $this->render('detallepedido/edit.html.twig', array(
            'detallePedido' => $detallePedido,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detallePedido entity.
     *
     * @Route("/{id}", name="detallepedido_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DetallePedido $detallePedido)
    {
        $form = $this->createDeleteForm($detallePedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detallePedido);
            $em->flush();
        }

        return $this->redirectToRoute('detallepedido_index');
    }

    /**
     * Creates a form to delete a detallePedido entity.
     *
     * @param DetallePedido $detallePedido The detallePedido entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetallePedido $detallePedido)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallepedido_delete', array('id' => $detallePedido->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Busca detalles de un pedido
     *
     * @Route("/ajax", name="buscar_detalles_pedido")
     * @return JsonResponse|Response
     */
    public function buscarDetallesPedido(Request $request){
        if ($request->isXmlHttpRequest()) {
            if ($request->request->get('idpedido')) {
                $idpedido = $request->request->get('idpedido');
                $em = $this->getDoctrine()->getManager();

                $dqlDetalles = "
                    SELECT d.id, d.cantidad, p.nombre FROM AppBundle:DetallePedido d
                    INNER JOIN AppBundle:Producto p WITH d.idProducto = p.id
                    WHERE d.idPedido = :id
                ";

                $queryDetalles = $em->createQuery($dqlDetalles)
                    ->setParameter('id', $idpedido);

                $detalles = $queryDetalles->getResult();

                return new JsonResponse($detalles);
            }
        }
        return $this->redirectToRoute('ordencompra_new');
    }
}
