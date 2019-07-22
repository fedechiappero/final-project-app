<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratistaObra
 *
 * @ORM\Table(name="contratista_obra", indexes={@ORM\Index(name="id_contratista_rubro", columns={"id_contratista_rubro"}), @ORM\Index(name="id_obra", columns={"id_obra"})})
 * @ORM\Entity
 */
class ContratistaObra
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_desde", type="date", nullable=false)
     */
    private $fechaDesde;

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
     * @var \AppBundle\Entity\Obra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Obra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_obra", referencedColumnName="id")
     * })
     */
    private $idObra;

    /**
     * @var \AppBundle\Entity\ContratistaRubro
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ContratistaRubro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contratista_rubro", referencedColumnName="id")
     * })
     */
    private $idContratistaRubro;



    /**
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     *
     * @return ContratistaObra
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;

        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     *
     * @return ContratistaObra
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
     * Set idObra
     *
     * @param \AppBundle\Entity\Obra $idObra
     *
     * @return ContratistaObra
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

    /**
     * Set idContratistaRubro
     *
     * @param \AppBundle\Entity\ContratistaRubro $idContratistaRubro
     *
     * @return ContratistaObra
     */
    public function setIdContratistaRubro(\AppBundle\Entity\ContratistaRubro $idContratistaRubro = null)
    {
        $this->idContratistaRubro = $idContratistaRubro;

        return $this;
    }

    /**
     * Get idContratistaRubro
     *
     * @return \AppBundle\Entity\ContratistaRubro
     */
    public function getIdContratistaRubro()
    {
        return $this->idContratistaRubro;
    }
}
