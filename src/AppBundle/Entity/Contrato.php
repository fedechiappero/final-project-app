<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrato
 *
 * @ORM\Table(name="contrato", indexes={@ORM\Index(name="id_obra", columns={"id_obra"}), @ORM\Index(name="id_presupuesto", columns={"id_presupuesto"})})
 * @ORM\Entity
 */
class Contrato
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="datetime", nullable=false)
     */
    private $fechaEmision;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_nombre", type="string", length=255, nullable=false)
     */
    private $arquitectoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_matricula", type="string", length=255, nullable=false)
     */
    private $arquitectoMatricula;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_domicilio", type="string", length=255, nullable=false)
     */
    private $arquitectoDomicilio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_estimada_inicio", type="date", nullable=false)
     */
    private $fechaEstimadaInicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Presupuesto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Presupuesto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_presupuesto", referencedColumnName="id")
     * })
     */
    private $idPresupuesto;

    /**
     * @var \AppBundle\Entity\Obra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Obra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_obra", referencedColumnName="id")
     * })
     */
    private $idObra;



    /**
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     *
     * @return Contrato
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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Contrato
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
     * Set arquitectoNombre
     *
     * @param string $arquitectoNombre
     *
     * @return Contrato
     */
    public function setArquitectoNombre($arquitectoNombre)
    {
        $this->arquitectoNombre = $arquitectoNombre;

        return $this;
    }

    /**
     * Get arquitectoNombre
     *
     * @return string
     */
    public function getArquitectoNombre()
    {
        return $this->arquitectoNombre;
    }

    /**
     * Set arquitectoMatricula
     *
     * @param string $arquitectoMatricula
     *
     * @return Contrato
     */
    public function setArquitectoMatricula($arquitectoMatricula)
    {
        $this->arquitectoMatricula = $arquitectoMatricula;

        return $this;
    }

    /**
     * Get arquitectoMatricula
     *
     * @return string
     */
    public function getArquitectoMatricula()
    {
        return $this->arquitectoMatricula;
    }

    /**
     * Set arquitectoDomicilio
     *
     * @param string $arquitectoDomicilio
     *
     * @return Contrato
     */
    public function setArquitectoDomicilio($arquitectoDomicilio)
    {
        $this->arquitectoDomicilio = $arquitectoDomicilio;

        return $this;
    }

    /**
     * Get arquitectoDomicilio
     *
     * @return string
     */
    public function getArquitectoDomicilio()
    {
        return $this->arquitectoDomicilio;
    }

    /**
     * Set fechaEstimadaInicio
     *
     * @param \DateTime $fechaEstimadaInicio
     *
     * @return Contrato
     */
    public function setFechaEstimadaInicio($fechaEstimadaInicio)
    {
        $this->fechaEstimadaInicio = $fechaEstimadaInicio;

        return $this;
    }

    /**
     * Get fechaEstimadaInicio
     *
     * @return \DateTime
     */
    public function getFechaEstimadaInicio()
    {
        return $this->fechaEstimadaInicio;
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
     * Set idPresupuesto
     *
     * @param \AppBundle\Entity\Presupuesto $idPresupuesto
     *
     * @return Contrato
     */
    public function setIdPresupuesto(\AppBundle\Entity\Presupuesto $idPresupuesto = null)
    {
        $this->idPresupuesto = $idPresupuesto;

        return $this;
    }

    /**
     * Get idPresupuesto
     *
     * @return \AppBundle\Entity\Presupuesto
     */
    public function getIdPresupuesto()
    {
        return $this->idPresupuesto;
    }

    /**
     * Set idObra
     *
     * @param \AppBundle\Entity\Obra $idObra
     *
     * @return Contrato
     */
    public function setIdObra(\AppBundle\Entity\Obra $idObra = null)
    {
        $this->idObra = $idObra;

        return $this;
    }

    /**
     * Get idObra
     *
     * @return \AppBundle\Entity\Obra
     */
    public function getIdObra()
    {
        return $this->idObra;
    }
}
