<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table(name="venta")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VentaRepository")
 */
class Venta
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
     * @ORM\Column(name="id_inmueble", type="integer")
     */
    private $idInmueble;

    /**
     * @var int
     *
     * @ORM\Column(name="id_vendedor", type="integer")
     */
    private $idVendedor;

    /**
     * @var int
     *
     * @ORM\Column(name="id_persona", type="integer")
     */
    private $idPersona;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_factura", type="integer")
     */
    private $numeroFactura;

    /**
     * @var int
     *
     * @ORM\Column(name="id_modopago", type="integer")
     */
    private $idModopago;

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
     * Set idInmueble
     *
     * @param integer $idInmueble
     *
     * @return Venta
     */
    public function setIdInmueble($idInmueble)
    {
        $this->idInmueble = $idInmueble;

        return $this;
    }

    /**
     * Get idInmueble
     *
     * @return int
     */
    public function getIdInmueble()
    {
        return $this->idInmueble;
    }

    /**
     * Set idVendedor
     *
     * @param integer $idVendedor
     *
     * @return Venta
     */
    public function setIdVendedor($idVendedor)
    {
        $this->idVendedor = $idVendedor;

        return $this;
    }

    /**
     * Get idVendedor
     *
     * @return int
     */
    public function getIdVendedor()
    {
        return $this->idVendedor;
    }

    /**
     * Set idPersona
     *
     * @param integer $idPersona
     *
     * @return Venta
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return int
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

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
     * @return int
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
     * @return int
     */
    public function getNumeroFactura()
    {
        return $this->numeroFactura;
    }

    /**
     * Set idModopago
     *
     * @param integer $idModopago
     *
     * @return Venta
     */
    public function setIdModopago($idModopago)
    {
        $this->idModopago = $idModopago;

        return $this;
    }

    /**
     * Get idModopago
     *
     * @return int
     */
    public function getIdModopago()
    {
        return $this->idModopago;
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
}

