<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transferencia
 *
 * @ORM\Table(name="transferencia", indexes={@ORM\Index(name="id_banco", columns={"id_banco"}), @ORM\Index(name="id_pago", columns={"id_pago"})})
 * @ORM\Entity
 */
class Transferencia
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
     * @ORM\Column(name="titular", type="string", length=255, nullable=false)
     */
    private $titular;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=255, nullable=false)
     */
    private $cuit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

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

