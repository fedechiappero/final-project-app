<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprobanteProveedor
 *
 * @ORM\Table(name="comprobante_proveedor", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_2922E8A8559B703C", columns={"id_orden_compra"})}, indexes={@ORM\Index(name="id_proveedor", columns={"id_proveedor"}), @ORM\Index(name="id_remito", columns={"id_remito"}), @ORM\Index(name="id_orden_compra", columns={"id_orden_compra"})})
 * @ORM\Entity
 */
class ComprobanteProveedor
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="datetime", nullable=false)
     */
    private $fechaEmision;

    /**
     * @var string
     *
     * @ORM\Column(name="letra", type="string", length=255, nullable=false)
     */
    private $letra;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="punto_venta", type="integer", nullable=false)
     */
    private $puntoVenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date", nullable=false)
     */
    private $fechaVencimiento;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cuenta_corriente", type="boolean", nullable=false)
     */
    private $cuentaCorriente;

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
     * @var \AppBundle\Entity\Proveedor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Proveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
     * })
     */
    private $idProveedor;

    /**
     * @var \AppBundle\Entity\Remito
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Remito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_remito", referencedColumnName="id")
     * })
     */
    private $idRemito;

    /**
     * @var \AppBundle\Entity\OrdenCompra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OrdenCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_orden_compra", referencedColumnName="id")
     * })
     */
    private $idOrdenCompra;



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
     * @return integer
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
     * @return integer
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
     * @return boolean
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
     * Set idProveedor
     *
     * @param \AppBundle\Entity\Proveedor $idProveedor
     *
     * @return ComprobanteProveedor
     */
    public function setIdProveedor(\AppBundle\Entity\Proveedor $idProveedor = null)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return \AppBundle\Entity\Proveedor
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set idRemito
     *
     * @param \AppBundle\Entity\Remito $idRemito
     *
     * @return ComprobanteProveedor
     */
    public function setIdRemito(\AppBundle\Entity\Remito $idRemito = null)
    {
        $this->idRemito = $idRemito;

        return $this;
    }

    /**
     * Get idRemito
     *
     * @return \AppBundle\Entity\Remito
     */
    public function getIdRemito()
    {
        return $this->idRemito;
    }

    /**
     * Set idOrdenCompra
     *
     * @param \AppBundle\Entity\OrdenCompra $idOrdenCompra
     *
     * @return ComprobanteProveedor
     */
    public function setIdOrdenCompra(\AppBundle\Entity\OrdenCompra $idOrdenCompra = null)
    {
        $this->idOrdenCompra = $idOrdenCompra;

        return $this;
    }

    /**
     * Get idOrdenCompra
     *
     * @return \AppBundle\Entity\OrdenCompra
     */
    public function getIdOrdenCompra()
    {
        return $this->idOrdenCompra;
    }
}
