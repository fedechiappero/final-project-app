<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table(name="venta", indexes={@ORM\Index(name="id_inmueble", columns={"id_inmueble"}), @ORM\Index(name="id_vendedor", columns={"id_enc_venta"}), @ORM\Index(name="id_persona", columns={"id_cliente"}), @ORM\Index(name="id_modopago", columns={"id_modopago"})})
 * @ORM\Entity
 */
class Venta
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_factura", type="integer", nullable=false)
     */
    private $numeroFactura;

    /**
     * @var float
     *
     * @ORM\Column(name="subtotal", type="float", precision=10, scale=0, nullable=false)
     */
    private $subtotal;

    /**
     * @var float
     *
     * @ORM\Column(name="descuento_porcentaje", type="float", precision=10, scale=0, nullable=false)
     */
    private $descuentoPorcentaje;

    /**
     * @var float
     *
     * @ORM\Column(name="neto_gravado", type="float", precision=10, scale=0, nullable=false)
     */
    private $netoGravado;

    /**
     * @var float
     *
     * @ORM\Column(name="total_iva", type="float", precision=10, scale=0, nullable=false)
     */
    private $totalIva;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=false)
     */
    private $total;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\EncVenta
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EncVenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_enc_venta", referencedColumnName="id")
     * })
     */
    private $idEncVenta;

    /**
     * @var \AppBundle\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     * })
     */
    private $idCliente;

    /**
     * @var \AppBundle\Entity\ModoPago
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ModoPago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modopago", referencedColumnName="id")
     * })
     */
    private $idModopago;

    /**
     * @var \AppBundle\Entity\Inmueble
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Inmueble")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inmueble", referencedColumnName="id")
     * })
     */
    private $idInmueble;



    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Venta
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Venta
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set numeroFactura
     *
     * @param integer $numeroFactura
     *
     * @return Venta
     */
    public function setNumeroFactura($numeroFactura)
    {
        $this->numeroFactura = $numeroFactura;

        return $this;
    }

    /**
     * Get numeroFactura
     *
     * @return integer
     */
    public function getNumeroFactura()
    {
        return $this->numeroFactura;
    }

    /**
     * Set subtotal
     *
     * @param float $subtotal
     *
     * @return Venta
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
     * @return Venta
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
     * @return Venta
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
     * @return Venta
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
     * @return Venta
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
     * Set idEncVenta
     *
     * @param \AppBundle\Entity\EncVenta $idEncVenta
     *
     * @return Venta
     */
    public function setIdEncVenta(\AppBundle\Entity\EncVenta $idEncVenta = null)
    {
        $this->idEncVenta = $idEncVenta;

        return $this;
    }

    /**
     * Get idEncVenta
     *
     * @return \AppBundle\Entity\EncVenta
     */
    public function getIdEncVenta()
    {
        return $this->idEncVenta;
    }

    /**
     * Set idCliente
     *
     * @param \AppBundle\Entity\Cliente $idCliente
     *
     * @return Venta
     */
    public function setIdCliente(\AppBundle\Entity\Cliente $idCliente = null)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set idModopago
     *
     * @param \AppBundle\Entity\ModoPago $idModopago
     *
     * @return Venta
     */
    public function setIdModopago(\AppBundle\Entity\ModoPago $idModopago = null)
    {
        $this->idModopago = $idModopago;

        return $this;
    }

    /**
     * Get idModopago
     *
     * @return \AppBundle\Entity\ModoPago
     */
    public function getIdModopago()
    {
        return $this->idModopago;
    }

    /**
     * Set idInmueble
     *
     * @param \AppBundle\Entity\Inmueble $idInmueble
     *
     * @return Venta
     */
    public function setIdInmueble(\AppBundle\Entity\Inmueble $idInmueble = null)
    {
        $this->idInmueble = $idInmueble;

        return $this;
    }

    /**
     * Get idInmueble
     *
     * @return \AppBundle\Entity\Inmueble
     */
    public function getIdInmueble()
    {
        return $this->idInmueble;
    }
}
