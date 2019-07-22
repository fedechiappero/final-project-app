<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleOrden
 *
 * @ORM\Table(name="detalle_orden", indexes={@ORM\Index(name="id_orden", columns={"id_orden"}), @ORM\Index(name="id_producto", columns={"id_producto"})})
 * @ORM\Entity
 */
class DetalleOrden
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="precio_unitario", type="float", precision=10, scale=0, nullable=false)
     */
    private $precioUnitario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Producto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_producto", referencedColumnName="id")
     * })
     */
    private $idProducto;

    /**
     * @var \AppBundle\Entity\OrdenCompra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OrdenCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_orden", referencedColumnName="id")
     * })
     */
    private $idOrden;


}

