<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProyectoArquitectoFin
 *
 * @ORM\Table(name="proyecto_arquitecto_fin", indexes={@ORM\Index(name="id_proyecto_aquitecto", columns={"id_proyecto_aquitecto"})})
 * @ORM\Entity
 */
class ProyectoArquitectoFin
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hasta", type="date", nullable=false)
     */
    private $fechaHasta;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\ProyectoArquitecto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProyectoArquitecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proyecto_aquitecto", referencedColumnName="id")
     * })
     */
    private $idProyectoAquitecto;



    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     *
     * @return ProyectoArquitectoFin
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;

        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
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
     * Set idProyectoAquitecto
     *
     * @param \AppBundle\Entity\ProyectoArquitecto $idProyectoAquitecto
     *
     * @return ProyectoArquitectoFin
     */
    public function setIdProyectoAquitecto(\AppBundle\Entity\ProyectoArquitecto $idProyectoAquitecto = null)
    {
        $this->idProyectoAquitecto = $idProyectoAquitecto;

        return $this;
    }

    /**
     * Get idProyectoAquitecto
     *
     * @return \AppBundle\Entity\ProyectoArquitecto
     */
    public function getIdProyectoAquitecto()
    {
        return $this->idProyectoAquitecto;
    }
}
