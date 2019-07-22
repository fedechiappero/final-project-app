<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprobanteProveedor
 *
 * @ORM\Table(name="comprobante_proveedor", indexes={@ORM\Index(name="id_proveedor", columns={"id_proveedor"}), @ORM\Index(name="id_remito", columns={"id_remito"})})
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
     * @var \AppBundle\Entity\Remito
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Remito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_remito", referencedColumnName="id")
     * })
     */
    private $idRemito;

    /**
     * @var \AppBundle\Entity\Proveedor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Proveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
     * })
     */
    private $idProveedor;


}

