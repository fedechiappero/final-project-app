<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProyectoArquitecto
 *
 * @ORM\Table(name="proyecto_arquitecto", indexes={@ORM\Index(name="id_proyecto", columns={"id_proyecto"}), @ORM\Index(name="id_arquitecto", columns={"id_arquitecto"})})
 * @ORM\Entity
 */
class ProyectoArquitecto
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
     * @var \AppBundle\Entity\Arquitecto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Arquitecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_arquitecto", referencedColumnName="id")
     * })
     */
    private $idArquitecto;

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

