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


}

