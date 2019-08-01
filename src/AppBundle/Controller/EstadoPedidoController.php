<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EstadoPedido;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Estado pedido controller.
 *
 * @Route("estadopedido")
 */
class EstadoPedidoController extends Controller
{
    /**
     * Displays a form to edit an existing estado entity.
     *
     * @Route("/ajax", name="estado_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
        if ($request->isXmlHttpRequest() && $request->request->get('idPedido') && $request->request->get('estado')) {
            $pedido = $request->request->get('idPedido');
            $estado = $request->request->get('estado');
            $em = $this->getDoctrine()->getManager();

            $res = $em->getRepository('AppBundle:EstadoPedido')->newStatus($pedido, $estado);

            if($res){
                return new JsonResponse(['success' => true]);
            }
            return new JsonResponse(['error' => true]);

        }
        return $this->redirectToRoute('pedido_index');
    }
}