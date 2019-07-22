<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenio
 *
 * @ORM\Table(name="convenio", indexes={@ORM\Index(name="id_proveedor", columns={"id_proveedor"})})
 * @ORM\Entity
 */
class Convenio
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vigente", type="boolean", nullable=false)
     */
    private $vigente;

    /**
     * @var float
     *
     * @ORM\Column(name="descuento_porcentaje", type="float", precision=10, scale=0, nullable=false)
     */
    private $descuentoPorcentaje;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Proveedor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Proveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
     * })
     */
    private $idProveedor;



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
     * @return boolean
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
     * Set idProveedor
     *
     * @param \AppBundle\Entity\Proveedor $idProveedor
     *
     * @return Convenio
     */
    public function setIdProveedor(\AppBundle\Entity\Proveedor $idProveedor = null)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return \AppBundle\Entity\Proveedor
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
}
