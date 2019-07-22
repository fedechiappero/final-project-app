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



    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return DetalleOrden
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precioUnitario
     *
     * @param float $precioUnitario
     *
     * @return DetalleOrden
     */
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    /**
     * Get precioUnitario
     *
     * @return float
     */
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idProducto
     *
     * @param \AppBundle\Entity\Producto $idProducto
     *
     * @return DetalleOrden
     */
    public function setIdProducto(\AppBundle\Entity\Producto $idProducto = null)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \AppBundle\Entity\Producto
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set idOrden
     *
     * @param \AppBundle\Entity\OrdenCompra $idOrden
     *
     * @return DetalleOrden
     */
    public function setIdOrden(\AppBundle\Entity\OrdenCompra $idOrden = null)
    {
        $this->idOrden = $idOrden;

        return $this;
    }

    /**
     * Get idOrden
     *
     * @return \AppBundle\Entity\OrdenCompra
     */
    public function getIdOrden()
    {
        return $this->idOrden;
    }
}
