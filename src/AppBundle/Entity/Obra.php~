<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Obra
 *
 * @ORM\Table(name="obra", indexes={@ORM\Index(name="id_persona", columns={"id_persona"})})
 * @ORM\Entity
 */
class Obra
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
     * @ORM\Column(name="direccion", type="string", length=255, nullable=false)
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255, nullable=false)
     */
    private $foto;

    /**
     * @var integer
     *
     * @ORM\Column(name="legajo_municipal_numero", type="integer", nullable=false)
     */
    private $legajoMunicipalNumero;

    /**
     * @var integer
     *
     * @ORM\Column(name="colegio_arquitecto_numero", type="integer", nullable=false)
     */
    private $colegioArquitectoNumero;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Persona
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;


}

