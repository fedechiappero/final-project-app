<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PagoMedioPago
 *
 * @ORM\Table(name="pago_medio_pago", indexes={@ORM\Index(name="id_pago", columns={"id_pago"}), @ORM\Index(name="id_medio_pago", columns={"id_medio_pago"})})
 * @ORM\Entity
 */
class PagoMedioPago
{
    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=0, nullable=false)
     */
    private $importe;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\MedioPago
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MedioPago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_medio_pago", referencedColumnName="id")
     * })
     */
    private $idMedioPago;

    /**
     * @var \AppBundle\Entity\Pago
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pago", referencedColumnName="id")
     * })
     */
    private $idPago;


}

