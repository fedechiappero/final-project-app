<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleComprobante
 *
 * @ORM\Table(name="detalle_comprobante")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetalleComprobanteRepository")
 */
class DetalleComprobante
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
     * @ORM\Column(name="id_comprobante", type="integer")
     */
    private $idComprobante;

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
     * @var int
     *
     * @ORM\Column(name="cantidad_recibida", type="integer")
     */
    private $cantidadRecibida;

    /**
     * @var float
     *
     * @ORM\Column(name="iva", type="float")
     */
    private $iva;


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
     * Set idComprobante
     *
     * @param integer $idComprobante
     *
     * @return DetalleComprobante
     */
    public function setIdComprobante($idComprobante)
    {
        $this->idComprobante = $idComprobante;

        return $this;
    }

    /**
     * Get idComprobante
     *
     * @return int
     */
    public function getIdComprobante()
    {
        return $this->idComprobante;
    }

    /**
     * Set idProducto
     *
     * @param integer $idProducto
     *
     * @return DetalleComprobante
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
     * @return DetalleComprobante
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
     * @return DetalleComprobante
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
     * Set cantidadRecibida
     *
     * @param integer $cantidadRecibida
     *
     * @return DetalleComprobante
     */
    public function setCantidadRecibida($cantidadRecibida)
    {
        $this->cantidadRecibida = $cantidadRecibida;

        return $this;
    }

    /**
     * Get cantidadRecibida
     *
     * @return int
     */
    public function getCantidadRecibida()
    {
        return $this->cantidadRecibida;
    }

    /**
     * Set iva
     *
     * @param float $iva
     *
     * @return DetalleComprobante
     */
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return float
     */
    public function getIva()
    {
        return $this->iva;
    }
}

