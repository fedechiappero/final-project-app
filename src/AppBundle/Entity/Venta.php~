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


}

