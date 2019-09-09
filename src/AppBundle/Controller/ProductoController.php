<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Producto;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Proxies\__CG__\AppBundle\Entity\Precio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Producto controller.
 *
 * @Route("producto")
 */
class ProductoController extends Controller
{
    /**
     * Lists all producto entities.
     *
     * @Route("/", name="producto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('AppBundle:Producto')->findAll();

        return $this->render('producto/index.html.twig', array(
            'productos' => $productos,
        ));
    }

    /**
     * Creates a new producto entity.
     *
     * @Route("/new", name="producto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        if ($request->isMethod('POST')) {
            
            $nombre = $request->request->get('nombre');
            $unidad = $request->request->get('unidad');
            $stock = $request->request->get('stock');

            $producto = new Producto();
            $producto
                ->setNombre($nombre)
                ->setUnidad($unidad)
                ->setStock($stock);

            $em->persist($producto);
            $em->flush();

            $arrprecios = $request->request->get('arrprecios');
            $indice = 0;
            $arrpre = explode(',', $arrprecios);//paso a arreglo
            $longitud = count($arrpre);
            while($indice < $longitud){
                $precioval = $arrpre[$indice+1];

                $proveedor = $em->getRepository('AppBundle:Proveedor')->findOneBy(array('razonSocial' => $arrpre[$indice]));

                $precio = new Precio();
                $precio
                    ->setIdProveedor($proveedor)
                    ->setFechaUltimaActualizacion(new \DateTime('now'))
                    ->setIdProducto($producto)
                    ->setPrecio($precioval);

                $em->persist($precio);
                $em->flush();

                $indice += 2;
            }
            
            return $this->redirectToRoute('producto_show', array('id' => $producto->getId()));
        }

        $proveedores = $em->getRepository('AppBundle:Proveedor')->findAll();

        return $this->render('producto/new.html.twig', array(
            'proveedores' => $proveedores
        ));
    }

    /**
     * Finds and displays a producto entity.
     *
     * @Route("/{id}", name="producto_show")
     * @Method("GET")
     */
    public function showAction(Producto $producto)
    {
        $em = $this->getDoctrine()->getManager();

        /*$sql = "
            SELECT p.id, p.precio, DATE_FORMAT(p.fecha_ultima_actualizacion, '%Y-%m-%d-%H-%i') AS ultimaActualizacion, pr.razon_social AS razonSocial FROM precio p
            INNER JOIN (
                SELECT id_proveedor, MAX(fecha_ultima_actualizacion) AS ultimaActualizacion_2 FROM precio
                WHERE id_producto = ? 
                GROUP BY id_proveedor 
            ) precioagrupado
            ON p.id_proveedor = precioagrupado.id_proveedor AND p.fecha_ultima_actualizacion = precioagrupado.ultimaActualizacion_2
            INNER JOIN proveedor pr ON p.id_proveedor = pr.id
        ";*/

        /*$rsm = new ResultSetMapping();

        $rsm->addEntityResult('AppBundle:Precio', 'p');
        $rsm->addFieldResult('p', 'id', 'id');
        $rsm->addFieldResult('p', 'precio', 'precio');
        $rsm->addFieldResult('p', 'fecha_ultima_actualizacion', 'fechaUltimaActualizacion');
        $rsm->addMetaResult('p', 'id_proveedor', 'id_proveedor');*/

        /*$rsm->addJoinedEntityResult('AppBundle:Proveedor', 'pr', 'p', 'proveedores');
        $rsm->addFieldResult('pr', 'id_proveedor', 'idProveedor');
        $rsm->addFieldResult('pr', 'razon_social', 'razonSocial');*/


        $rsm = new ResultSetMappingBuilder($em);

        $rsm->addRootEntityFromClassMetadata('AppBundle\Entity\Precio', 'p');
        //$rsm->addJoinedEntityFromClassMetadata('AppBundle\Entity\Proveedor', 'pr', 'p', 'id_proveedor'/*, array('id' => 'idProveedor')*/);


        $query = $em->createNativeQuery('SELECT p.id, p.precio, p.fecha_ultima_actualizacion, p.id_proveedor, pr.razon_social FROM precio p
            INNER JOIN (
                SELECT id_proveedor, MAX(fecha_ultima_actualizacion) AS ultimaActualizacion_2 FROM precio
                WHERE id_producto = ? 
                GROUP BY id_proveedor 
            ) precioagrupado
            ON p.id_proveedor = precioagrupado.id_proveedor AND p.fecha_ultima_actualizacion = precioagrupado.ultimaActualizacion_2
            INNER JOIN proveedor pr ON p.id_proveedor = pr.id', $rsm);

        $query->setParameter(1, $producto->getId());

        $precios = $query->getResult();

        //dump($precios);

        return $this->render('producto/show.html.twig', array(
            'producto' => $producto,
            'precios' => $precios
        ));
    }

    /**
     * Displays a form to edit an existing producto entity.
     *
     * @Route("/{id}/edit", name="producto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Producto $producto)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $unidad = $request->request->get('unidad');
            $stock = $request->request->get('stock');

            $producto
                ->setNombre($nombre)
                ->setUnidad($unidad)
                ->setStock($stock);

            $em->flush();

            $arrprecios = $request->request->get('arrprecios');
            $indice = 0;
            $arrpre = explode(',', $arrprecios);//paso a arreglo
            $longitud = count($arrpre);
            while($indice < $longitud){
                $precioval = $arrpre[$indice+1];

                $proveedor = $em->getRepository('AppBundle:Proveedor')->findOneBy(array('razonSocial' => $arrpre[$indice]));

                $precio = new Precio();
                $precio
                    ->setIdProveedor($proveedor)
                    ->setFechaUltimaActualizacion(new \DateTime('now'))
                    ->setIdProducto($producto)
                    ->setPrecio($precioval);

                $em->persist($precio);
                $em->flush();

                $indice += 2;
            }

            return $this->redirectToRoute('producto_show', array('id' => $producto->getId()));
        }

        $proveedores = $em->getRepository('AppBundle:Proveedor')->findAll();

        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AppBundle\Entity\Precio', 'p');

        $query = $em->createNativeQuery('SELECT p.id, p.precio, p.fecha_ultima_actualizacion, p.id_proveedor, pr.razon_social FROM precio p
            INNER JOIN (
                SELECT id_proveedor, MAX(fecha_ultima_actualizacion) AS ultimaActualizacion_2 FROM precio
                WHERE id_producto = ? 
                GROUP BY id_proveedor 
            ) precioagrupado
            ON p.id_proveedor = precioagrupado.id_proveedor AND p.fecha_ultima_actualizacion = precioagrupado.ultimaActualizacion_2
            INNER JOIN proveedor pr ON p.id_proveedor = pr.id', $rsm);

        $query->setParameter(1, $producto->getId());

        $precios = $query->getResult();


        return $this->render('producto/edit.html.twig', array(
            'producto' => $producto,
            'precios' => $precios,
            'proveedores' => $proveedores
        ));
    }

    /**
     * Deletes a producto entity.
     *
     * @Route("/{id}", name="producto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Producto $producto)
    {
        $form = $this->createDeleteForm($producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producto);
            $em->flush();
        }

        return $this->redirectToRoute('producto_index');
    }

    /**
     * Creates a form to delete a producto entity.
     *
     * @param Producto $producto The producto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Producto $producto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producto_delete', array('id' => $producto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
