<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChequeTercero
 *
 * @ORM\Table(name="cheque_tercero", indexes={@ORM\Index(name="id_banco", columns={"id_banco"}), @ORM\Index(name="id_pago", columns={"id_pago"})})
 * @ORM\Entity
 */
class ChequeTercero
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit_titular", type="string", length=255, nullable=false)
     */
    private $cuitTitular;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_titular", type="string", length=255, nullable=false)
     */
    private $nombreTitular;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_cobro", type="date", nullable=false)
     */
    private $fechaCobro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="date", nullable=false)
     */
    private $fechaEmision;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_recibido", type="date", nullable=false)
     */
    private $fechaRecibido;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\PagoMedioPago
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PagoMedioPago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pago", referencedColumnName="id")
     * })
     */
    private $idPago;

    /**
     * @var \AppBundle\Entity\Banco
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Banco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_banco", referencedColumnName="id")
     * })
     */
    private $idBanco;


}

