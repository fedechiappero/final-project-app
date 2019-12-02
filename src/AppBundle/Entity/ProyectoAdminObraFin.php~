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


}

