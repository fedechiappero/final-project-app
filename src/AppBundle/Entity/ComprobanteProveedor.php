<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprobanteProveedor
 *
 * @ORM\Table(name="comprobante_proveedor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComprobanteProveedorRepository")
 */
class ComprobanteProveedor
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
     * @ORM\Column(name="id_proveedor", type="integer")
     */
    private $idProveedor;

    /**
     * @var int
     *
     * @ORM\Column(name="id_remito", type="integer")
     */
    private $idRemito;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="datetime")
     */
    private $fechaEmision;

    /**
     * @var string
     *
     * @ORM\Column(name="letra", type="string", length=255)
     */
    private $letra;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var int
     *
     * @ORM\Column(name="punto_venta", type="integer")
     */
    private $puntoVenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date")
     */
    private $fechaVencimiento;

    /**
     * @var bool
     *
     * @ORM\Column(name="cuenta_corriente", type="boolean")
     */
    private $cuentaCorriente;

    /**
     * @var float
     *
     * @ORM\Column(name="subtotal", type="float")
     */
    private $subtotal;

    /**
     * @var float
     *
     * @ORM\Column(name="descuento_porcentaje", type="float")
     */
    private $descuentoPorcentaje;

    /**
     * @var float
     *
     * @ORM\Column(name="neto_gravado", type="float")
     */
    private $netoGravado;

    /**
     * @var float
     *
     * @ORM\Column(name="total_iva", type="float")
     */
    private $totalIva;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;


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
     * Set idProveedor
     *
     * @param integer $idProveedor
     *
     * @return ComprobanteProveedor
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return int
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set idRemito
     *
     * @param integer $idRemito
     *
     * @return ComprobanteProveedor
     */
    public function setIdRemito($idRemito)
    {
        $this->idRemito = $idRemito;

        return $this;
    }

    /**
     * Get idRemito
     *
     * @return int
     */
    public function getIdRemito()
    {
        return $this->idRemito;
    }

    /**
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     *
     * @return ComprobanteProveedor
     */
    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    /**
     * Get fechaEmision
     *
     * @return \DateTime
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set letra
     *
     * @param string $letra
     *
     * @return ComprobanteProveedor
     */
    public function setLetra($letra)
    {
        $this->letra = $letra;

        return $this;
    }

    /**
     * Get letra
     *
     * @return string
     */
    public function getLetra()
    {
        return $this->letra;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return ComprobanteProveedor
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set puntoVenta
     *
     * @param integer $puntoVenta
     *
     * @return ComprobanteProveedor
     */
    public function setPuntoVenta($puntoVenta)
    {
        $this->puntoVenta = $puntoVenta;

        return $this;
    }

    /**
     * Get puntoVenta
     *
     * @return int
     */
    public function getPuntoVenta()
    {
        return $this->puntoVenta;
    }

    /**
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     *
     * @return ComprobanteProveedor
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set cuentaCorriente
     *
     * @param boolean $cuentaCorriente
     *
     * @return ComprobanteProveedor
     */
    public function setCuentaCorriente($cuentaCorriente)
    {
        $this->cuentaCorriente = $cuentaCorriente;

        return $this;
    }

    /**
     * Get cuentaCorriente
     *
     * @return bool
     */
    public function getCuentaCorriente()
    {
        return $this->cuentaCorriente;
    }

    /**
     * Set subtotal
     *
     * @param float $subtotal
     *
     * @return ComprobanteProveedor
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set descuentoPorcentaje
     *
     * @param float $descuentoPorcentaje
     *
     * @return ComprobanteProveedor
     */
    public function setDescuentoPorcentaje($descuentoPorcentaje)
    {
        $this->descuentoPorcentaje = $descuentoPorcentaje;

        return $this;
    }

    /**
     * Get descuentoPorcentaje
     *
     * @return float
     */
    public function getDescuentoPorcentaje()
    {
        return $this->descuentoPorcentaje;
    }

    /**
     * Set netoGravado
     *
     * @param float $netoGravado
     *
     * @return ComprobanteProveedor
     */
    public function setNetoGravado($netoGravado)
    {
        $this->netoGravado = $netoGravado;

        return $this;
    }

    /**
     * Get netoGravado
     *
     * @return float
     */
    public function getNetoGravado()
    {
        return $this->netoGravado;
    }

    /**
     * Set totalIva
     *
     * @param float $totalIva
     *
     * @return ComprobanteProveedor
     */
    public function setTotalIva($totalIva)
    {
        $this->totalIva = $totalIva;

        return $this;
    }

    /**
     * Get totalIva
     *
     * @return float
     */
    public function getTotalIva()
    {
        return $this->totalIva;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return ComprobanteProveedor
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }
}

