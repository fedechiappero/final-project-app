<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChequePropio
 *
 * @ORM\Table(name="cheque_propio", indexes={@ORM\Index(name="id_chequera", columns={"id_chequera"}), @ORM\Index(name="id_persona", columns={"id_persona"})})
 * @ORM\Entity
 */
class ChequePropio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_pago", type="date", nullable=false)
     */
    private $fechaPago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="date", nullable=false)
     */
    private $fechaEmision;

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
     * @var \AppBundle\Entity\Persona
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;

    /**
     * @var \AppBundle\Entity\Chequera
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Chequera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_chequera", referencedColumnName="id")
     * })
     */
    private $idChequera;


}

