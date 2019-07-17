<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presupuesto
 *
 * @ORM\Table(name="presupuesto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PresupuestoRepository")
 */
class Presupuesto
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
     * @ORM\Column(name="id_localidad", type="integer")
     */
    private $idLocalidad;

    /**
     * @var int
     *
     * @ORM\Column(name="id_persona", type="integer")
     */
    private $idPersona;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="datetime")
     */
    private $fechaEmision;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $valor;


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
     * Set idLocalidad
     *
     * @param integer $idLocalidad
     *
     * @return Presupuesto
     */
    public function setIdLocalidad($idLocalidad)
    {
        $this->idLocalidad = $idLocalidad;

        return $this;
    }

    /**
     * Get idLocalidad
     *
     * @return int
     */
    public function getIdLocalidad()
    {
        return $this->idLocalidad;
    }

    /**
     * Set idPersona
     *
     * @param integer $idPersona
     *
     * @return Presupuesto
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return int
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     *
     * @return Presupuesto
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
     * Set valor
     *
     * @param float $valor
     *
     * @return Presupuesto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }
}

