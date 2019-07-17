<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrato
 *
 * @ORM\Table(name="contrato")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContratoRepository")
 */
class Contrato
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_obra", type="integer")
     */
    private $idObra;

    /**
     * @var int
     *
     * @ORM\Column(name="id_presupuesto", type="integer")
     */
    private $idPresupuesto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="datetime")
     */
    private $fechaEmision;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_nombre", type="string", length=255)
     */
    private $arquitectoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_matricula", type="string", length=255)
     */
    private $arquitectoMatricula;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_domicilio", type="string", length=255)
     */
    private $arquitectoDomicilio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_estimada_inicio", type="date")
     */
    private $fechaEstimadaInicio;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idObra
     *
     * @param integer $idObra
     *
     * @return Contrato
     */
    public function setIdObra($idObra)
    {
        $this->idObra = $idObra;

        return $this;
    }

    /**
     * Get idObra
     *
     * @return int
     */
    public function getIdObra()
    {
        return $this->idObra;
    }

    /**
     * Set idPresupuesto
     *
     * @param integer $idPresupuesto
     *
     * @return Contrato
     */
    public function setIdPresupuesto($idPresupuesto)
    {
        $this->idPresupuesto = $idPresupuesto;

        return $this;
    }

    /**
     * Get idPresupuesto
     *
     * @return int
     */
    public function getIdPresupuesto()
    {
        return $this->idPresupuesto;
    }

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
     * @return int
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
}

