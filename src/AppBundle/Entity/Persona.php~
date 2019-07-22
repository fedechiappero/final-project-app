<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table(name="persona", indexes={@ORM\Index(name="id_localidad", columns={"id_localidad"})})
 * @ORM\Entity
 */
class Persona
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="persona_juridica", type="boolean", nullable=false)
     */
    private $personaJuridica;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=255, nullable=false)
     */
    private $cuit;

    /**
     * @var integer
     *
     * @ORM\Column(name="documento", type="integer", nullable=false)
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=255, nullable=false)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Localidad
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Localidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_localidad", referencedColumnName="id")
     * })
     */
    private $idLocalidad;


}

