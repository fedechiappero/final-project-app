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



    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return ChequePropio
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fechaPago
     *
     * @param \DateTime $fechaPago
     *
     * @return ChequePropio
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    /**
     * Get fechaPago
     *
     * @return \DateTime
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     *
     * @return ChequePropio
     */
    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    /**
     * Get fechaEmision
     *
     * @return \DateTime
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set importe
     *
     * @param float $importe
     *
     * @return ChequePropio
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPersona
     *
     * @param \AppBundle\Entity\Persona $idPersona
     *
     * @return ChequePropio
     */
    public function setIdPersona(\AppBundle\Entity\Persona $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set idChequera
     *
     * @param \AppBundle\Entity\Chequera $idChequera
     *
     * @return ChequePropio
     */
    public function setIdChequera(\AppBundle\Entity\Chequera $idChequera = null)
    {
        $this->idChequera = $idChequera;

        return $this;
    }

    /**
     * Get idChequera
     *
     * @return \AppBundle\Entity\Chequera
     */
    public function getIdChequera()
    {
        return $this->idChequera;
    }
}
