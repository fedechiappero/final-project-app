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


}

