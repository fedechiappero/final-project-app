<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenio
 *
 * @ORM\Table(name="convenio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConvenioRepository")
 */
class Convenio
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
     * @ORM\Column(name="id_proveedor", type="integer")
     */
    private $idProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var bool
     *
     * @ORM\Column(name="vigente", type="boolean")
     */
    private $vigente;

    /**
     * @var float
     *
     * @ORM\Column(name="descuento_porcentaje", type="float")
     */
    private $descuentoPorcentaje;


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
     * Set idProveedor
     *
     * @param integer $idProveedor
     *
     * @return Convenio
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return int
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Convenio
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Convenio
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set vigente
     *
     * @param boolean $vigente
     *
     * @return Convenio
     */
    public function setVigente($vigente)
    {
        $this->vigente = $vigente;

        return $this;
    }

    /**
     * Get vigente
     *
     * @return bool
     */
    public function getVigente()
    {
        return $this->vigente;
    }

    /**
     * Set descuentoPorcentaje
     *
     * @param float $descuentoPorcentaje
     *
     * @return Convenio
     */
    public function setDescuentoPorcentaje($descuentoPorcentaje)
    {
        $this->descuentoPorcentaje = $descuentoPorcentaje;

        return $this;
    }

    /**
     * Get descuentoPorcentaje
     *
     * @return float
     */
    public function getDescuentoPorcentaje()
    {
        return $this->descuentoPorcentaje;
    }
}

