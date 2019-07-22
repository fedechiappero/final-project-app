<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleCheque
 *
 * @ORM\Table(name="detalle_cheque", indexes={@ORM\Index(name="id_pago", columns={"id_pago"}), @ORM\Index(name="id_cheque", columns={"id_cheque"})})
 * @ORM\Entity
 */
class DetalleCheque
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
     * @var \AppBundle\Entity\ChequeTercero
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ChequeTercero")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cheque", referencedColumnName="id")
     * })
     */
    private $idCheque;

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

