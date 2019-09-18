<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ComprobanteProveedor;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Proxies\__CG__\AppBundle\Entity\DetalleComprobante;
use Proxies\__CG__\AppBundle\Entity\Remito;
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
        $em = $this->getDoctrine()->getManager();
        
        if ($request->isMethod('POST')) {

            $proveedor = $request->request->get('proveedorselected');
            $ordencompra = $request->request->get('idordencompra');
            $fechaemision = $request->request->get('fechaemision');
            $letra = $request->request->get('letraselected');
            $numero = $request->request->get('numero');
            $puntoventa = $request->request->get('puntoventa');
            $vencimiento = $request->request->get('venicimiento');
            $cuentacorriente = ($request->request->get('cuentacorriente') ? true : false);
            $remitofecha = $request->request->get('remitofecha');
            $remitonumero = $request->request->get('remitonumero');
            $subtotal = $request->request->get('subtotal');
            $descuento = $request->request->get('descuento');
            $netogravado = $request->request->get('netogravado');
            $totaliva = $request->request->get('totaliva');
            $total = $request->request->get('total');

            $remito = new Remito();
            $remito
                ->setFecha(new \DateTime($remitofecha))
                ->setNumero($remitonumero)
            ;
            $em->persist($remito);
            $em->flush();

            $proveedor = $em->getRepository('AppBundle:Proveedor')->find($proveedor);
            $ordencompra = $em->getRepository('AppBundle:OrdenCompra')->find($ordencompra);

            $comprobanteProveedor = new ComprobanteProveedor();
            $comprobanteProveedor
                ->setIdProveedor($proveedor)
                ->setIdOrdenCompra($ordencompra)
                ->setIdRemito($remito)
                ->setFechaEmision(new \DateTime($fechaemision))
                ->setLetra($letra)
                ->setNumero($numero)
                ->setPuntoVenta($puntoventa)
                ->setFechaVencimiento(new \DateTime($vencimiento))
                ->setCuentaCorriente($cuentacorriente)
                ->setSubtotal($subtotal)
                ->setDescuentoPorcentaje($descuento)
                ->setNetoGravado($netogravado)
                ->setTotalIva($totaliva)
                ->setTotal($total)
            ;
            $em->persist($comprobanteProveedor);
            $em->flush();

            //details (product + quantity)
            $arrproductos = $request->request->get('arrproductos');
            $indice = 0;
            $arrprod = explode(',', $arrproductos);//paso a arreglo
            $longitud = count($arrprod);
            while($indice < $longitud){
                $cantidad = $arrprod[$indice+1];
                $cantrecibida = $arrprod[$indice+2];

                $producto = $em->getRepository('AppBundle:Producto')->find($arrprod[$indice]);

                $dql = "
                SELECT p.id FROM AppBundle:Precio p
                    WHERE p.idProducto = :idproducto AND 
                    p.fechaUltimaActualizacion IN (SELECT MAX(p2.fechaUltimaActualizacion) FROM AppBundle:Precio p2
                                                       GROUP BY p2.idProducto)
                ";

                $query = $em->createQuery($dql)
                    ->setParameter('idproducto', $producto->getId());

                //will throw an exception if more than one result are found, or if no result is found
                $idprecio = $query->getSingleResult();

                $detalleComprobante = new DetalleComprobante();
                $detalleComprobante
                    ->setIdComprobante($comprobanteProveedor)
                    ->setIdProducto($producto)
                    ->setCantidad($cantidad)
                    ->setCantidadRecibida($cantrecibida)
                    ->setIva(21)
                ;

                $em->persist($detalleComprobante);
                $em->flush();

                $indice += 3;
            }

            return $this->redirectToRoute('comprobanteproveedor_show', array('id' => $comprobanteProveedor->getId()));
        }

        $proveedores = $em->getRepository('AppBundle:Proveedor')->findAll();

        return $this->render('comprobanteproveedor/new.html.twig', array(
            'proveedores' => $proveedores
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
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();

        /*
        SELECT p.nombre, d.cantidad, d.cantidad_recibida, pr.precio FROM producto p
        LEFT JOIN (
        SELECT precio.id_producto, MAX(precio.fecha_ultima_actualizacion) AS fecha FROM precio
        WHERE fecha_ultima_actualizacion < '2019-09-17 16:26'
        GROUP BY id_producto) pricedate
        ON pricedate.id_producto = p.id
        JOIN precio pr
        ON pricedate.id_producto = pr.id_producto AND pricedate.fecha = pr.fecha_ultima_actualizacion
        INNER JOIN detalle_comprobante d
        ON d.id_producto = p.id
        WHERE d.id_comprobante = 1
        */

        /*$rsm = new ResultSetMappingBuilder($em);
        /*$rsm->addRootEntityFromClassMetadata('AppBundle\Entity\DetalleComprobante', 'd');
        $rsm->addJoinedEntityFromClassMetadata('AppBundle\Entity\Producto', 'p', 'd', 'idProducto', array('id' => 'id_producto'));
        $rsm->addJoinedEntityFromClassMetadata('AppBundle\Entity\Precio', 'pr', 'p', 'idProducto', array('id' => 'id_producto'));*/

        /*$rsm->addEntityResult('AppBundle\Entity\Precio', 'pr');
        $rsm->addFieldResult('pr', 'precio', 'precio');
        $rsm->addJoinedEntityResult('AppBundle\Entity\Producto', 'p', 'pr', 'idProducto');
        $rsm->addFieldResult('p', 'nombre', 'nombre');
        $rsm->addEntityResult('AppBundle\Entity\DetalleComprobante', 'd');
        $rsm->addFieldResult('d', 'cantidad', 'cantidad');
        $rsm->addFieldResult('d', 'cantidad_recibida', 'cantidadRecibida');
        $rsm->addJoinedEntityResult('AppBundle\Entity\Producto', 'p', 'd', 'idProducto');*/

        /*$rsm->addEntityResult('AppBundle\Entity\DetalleComprobante', 'd');
        $rsm->addFieldResult('d', 'cantidad', 'cantidad');
        $rsm->addFieldResult('d', 'cantidad_recibida', 'cantidadRecibida');
        $rsm->addMetaResult('d', 'id_producto', 'id_producto');*/


        /*$query = $em->createNativeQuery('SELECT id_producto AS idProducto, cantidad, cantidad_recibida FROM producto p
                                         LEFT JOIN (
                                            SELECT precio.id_producto, MAX(precio.fecha_ultima_actualizacion) AS fecha FROM precio
                                            WHERE fecha_ultima_actualizacion < :fechaComprobante
                                            GROUP BY id_producto
                                         ) pricedate
                                         ON pricedate.id_producto = p.id
                                         JOIN precio pr
                                         ON pricedate.id_producto = pr.id_producto AND pricedate.fecha = pr.fecha_ultima_actualizacion
                                         INNER JOIN detalle_comprobante d ON d.id_producto = p.id
                                         WHERE d.id_comprobante = :id', $rsm
        );*/

        /*$dqlDetalles = "
            SELECT p.nombre, d.cantidad, d.cantidadRecibida, pr.precio FROM AppBundle:Producto p
            INNER JOIN AppBundle:DetalleComprobante d WITH d.idProducto = p.id
            INNER JOIN AppBundle:Precio pr WITH pr.idProducto = p.id
            WHERE d.idComprobante = :id AND pr.fechaUltimaActualizacion IN 
                (SELECT MAX(pr2.fechaUltimaActualizacion) FROM AppBundle:Precio pr2
                   GROUP BY pr2.idProducto)
        ";*/

        /*$queryDetalles = $em->createQuery($dqlDetalles)
            ->setParameter('id',$comprobanteProveedor->getId());*/

        /*$query->setParameters(array(
            'fechaComprobante' => $comprobanteProveedor->getFechaEmision()->format('Y-m-d H:i'),
            'id' => $comprobanteProveedor->getId())
        );

        dump($query);*/

        /*$query = $em->createQuery('
                      SELECT IDENTITY(d.idProducto), p.nombre, d.cantidad, d.cantidadRecibida, pr.precio
                      FROM AppBundle:Producto p 
                      LEFT JOIN SELECT precio
                      JOIN AppBundle:DetalleComprobante d WITH d.idProducto = p.id
                      JOIN AppBundle:Precio pr WITH pr.idProducto = p.id'
        );*/

        $detalle = $em->createQueryBuilder('d');
        $precio = $em->createQueryBuilder()
            ->select('pr.idProducto, MAX(pr.fechaUltimaActualizacion) AS fecha')
            ->from('AppBundle:Precio', 'pr')
            ->where('fechaUltimaActualizacion < :fechaComprobante')
            ->groupBy('idProducto');

        $detalle = $detalle
            ->select('p.nombre, d.cantidad, d.cantidadRecibida, pr.precio')
            ->from('AppBundle:DetalleComprobante', 'd')
            ->leftjoin('('.$precio->getDql().')', 'pricedate')
            ->getQuery()
        ;
        dump($detalle);

        $detalles = $detalle->getResult();

        dump($detalles);

        return $this->render('comprobanteproveedor/show.html.twig', array(
            'comprobanteProveedor' => $comprobanteProveedor,
            'detalles' => $detalles
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
