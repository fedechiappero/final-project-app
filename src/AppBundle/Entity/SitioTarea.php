<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SitioTarea
 *
 * @ORM\Table(name="sitio_tarea", indexes={@ORM\Index(name="id_precio", columns={"id_precio"})})
 * @ORM\Entity
 */
class SitioTarea
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad", type="string", length=255, nullable=false)
     */
    private $unidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\PrecioSitioTarea
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PrecioSitioTarea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_precio", referencedColumnName="id")
     * })
     */
    private $idPrecio;


}

