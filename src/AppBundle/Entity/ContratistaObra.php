<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratistaObra
 *
 * @ORM\Table(name="contratista_obra")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContratistaObraRepository")
 */
class ContratistaObra
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
     * @ORM\Column(name="id_contratista_rubro", type="integer")
     */
    private $idContratistaRubro;

    /**
     * @var int
     *
     * @ORM\Column(name="id_obra", type="integer")
     */
    private $idObra;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_desde", type="date")
     */
    private $fechaDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hasta", type="date")
     */
    private $fechaHasta;


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
     * Set idContratistaRubro
     *
     * @param integer $idContratistaRubro
     *
     * @return ContratistaObra
     */
    public function setIdContratistaRubro($idContratistaRubro)
    {
        $this->idContratistaRubro = $idContratistaRubro;

        return $this;
    }

    /**
     * Get idContratistaRubro
     *
     * @return int
     */
    public function getIdContratistaRubro()
    {
        return $this->idContratistaRubro;
    }

    /**
     * Set idObra
     *
     * @param integer $idObra
     *
     * @return ContratistaObra
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
}

