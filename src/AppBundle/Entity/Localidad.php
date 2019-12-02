<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localidad
 *
 * @ORM\Table(name="localidad", indexes={@ORM\Index(name="id_provincia", columns={"id_provincia"})})
 * @ORM\Entity
 */
class Localidad
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
     * @ORM\Column(name="codigo_postal", type="string", length=255, nullable=false)
     */
    private $codigoPostal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Provincia
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Provincia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_provincia", referencedColumnName="id")
     * })
     */
    private $idProvincia;


}

