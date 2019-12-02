<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleTransferencia
 *
 * @ORM\Table(name="detalle_transferencia", indexes={@ORM\Index(name="id_pago", columns={"id_pago"}), @ORM\Index(name="id_transferencia", columns={"id_transferencia"})})
 * @ORM\Entity
 */
class DetalleTransferencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Pago
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pago", referencedColumnName="id")
     * })
     */
    private $idPago;

    /**
     * @var \AppBundle\Entity\Transferencia
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Transferencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_transferencia", referencedColumnName="id")
     * })
     */
    private $idTransferencia;


}

