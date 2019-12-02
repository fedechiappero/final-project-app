<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salida
 *
 * @ORM\Table(name="salida", indexes={@ORM\Index(name="id_destino", columns={"id_destino"}), @ORM\Index(name="id_cheque", columns={"id_cheque"})})
 * @ORM\Entity
 */
class Salida
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
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
     * @var \AppBundle\Entity\ChequeTercero
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ChequeTercero")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cheque", referencedColumnName="id")
     * })
     */
    private $idCheque;

    /**
     * @var \AppBundle\Entity\Destino
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Destino")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_destino", referencedColumnName="id")
     * })
     */
    private $idDestino;


}

