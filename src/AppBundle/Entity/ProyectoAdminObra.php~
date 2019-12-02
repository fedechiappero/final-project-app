<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProyectoAdminObra
 *
 * @ORM\Table(name="proyecto_admin_obra", indexes={@ORM\Index(name="id_proyecto", columns={"id_proyecto"}), @ORM\Index(name="id_admin_obra", columns={"id_admin_obra"})})
 * @ORM\Entity
 */
class ProyectoAdminObra
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_desde", type="date", nullable=false)
     */
    private $fechaDesde;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\AdminObra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AdminObra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_admin_obra", referencedColumnName="id")
     * })
     */
    private $idAdminObra;

    /**
     * @var \AppBundle\Entity\Proyecto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Proyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proyecto", referencedColumnName="id")
     * })
     */
    private $idProyecto;


}

