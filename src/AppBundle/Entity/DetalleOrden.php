<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleOrden
 *
 * @ORM\Table(name="detalle_orden", indexes={@ORM\Index(name="id_orden", columns={"id_orden"}), @ORM\Index(name="id_producto", columns={"id_precio"})})
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
     * @var \AppBundle\Entity\Precio
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Precio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_precio", referencedColumnName="id")
     * })
     */
    private $idPrecio;

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
     * Set idPrecio
     *
     * @param \AppBundle\Entity\Precio $idPrecio
     *
     * @return DetalleOrden
     */
    public function setIdPrecio(\AppBundle\Entity\Precio $idPrecio = null)
    {
        $this->idPrecio = $idPrecio;

        return $this;
    }

    /**
     * Get idPrecio
     *
     * @return \AppBundle\Entity\Precio
     */
    public function getIdPrecio()
    {
        return $this->idPrecio;
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
