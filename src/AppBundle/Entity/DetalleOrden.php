<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleOrden
 *
 * @ORM\Table(name="detalle_orden")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetalleOrdenRepository")
 */
class DetalleOrden
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_orden", type="integer")
     */
    private $idOrden;

    /**
     * @var int
     *
     * @ORM\Column(name="id_producto", type="integer")
     */
    private $idProducto;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="precio_unitario", type="float")
     */
    private $precioUnitario;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idOrden
     *
     * @param integer $idOrden
     *
     * @return DetalleOrden
     */
    public function setIdOrden($idOrden)
    {
        $this->idOrden = $idOrden;

        return $this;
    }

    /**
     * Get idOrden
     *
     * @return int
     */
    public function getIdOrden()
    {
        return $this->idOrden;
    }

    /**
     * Set idProducto
     *
     * @param integer $idProducto
     *
     * @return DetalleOrden
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return int
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

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
     * @return int
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
}

