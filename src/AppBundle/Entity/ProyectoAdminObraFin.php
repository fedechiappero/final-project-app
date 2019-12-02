<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProyectoAdminObraFin
 *
 * @ORM\Table(name="proyecto_admin_obra_fin", indexes={@ORM\Index(name="id_proyecto_admin_obra", columns={"id_proyecto_admin_obra"})})
 * @ORM\Entity
 */
class ProyectoAdminObraFin
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
     * @var \AppBundle\Entity\ProyectoAdminObra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProyectoAdminObra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proyecto_admin_obra", referencedColumnName="id")
     * })
     */
    private $idProyectoAdminObra;



    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     *
     * @return ProyectoAdminObraFin
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
     * Set idProyectoAdminObra
     *
     * @param \AppBundle\Entity\ProyectoAdminObra $idProyectoAdminObra
     *
     * @return ProyectoAdminObraFin
     */
    public function setIdProyectoAdminObra(\AppBundle\Entity\ProyectoAdminObra $idProyectoAdminObra = null)
    {
        $this->idProyectoAdminObra = $idProyectoAdminObra;

        return $this;
    }

    /**
     * Get idProyectoAdminObra
     *
     * @return \AppBundle\Entity\ProyectoAdminObra
     */
    public function getIdProyectoAdminObra()
    {
        return $this->idProyectoAdminObra;
    }
}
