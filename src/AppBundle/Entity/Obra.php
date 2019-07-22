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



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Obra
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Obra
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Obra
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Obra
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set legajoMunicipalNumero
     *
     * @param integer $legajoMunicipalNumero
     *
     * @return Obra
     */
    public function setLegajoMunicipalNumero($legajoMunicipalNumero)
    {
        $this->legajoMunicipalNumero = $legajoMunicipalNumero;

        return $this;
    }

    /**
     * Get legajoMunicipalNumero
     *
     * @return integer
     */
    public function getLegajoMunicipalNumero()
    {
        return $this->legajoMunicipalNumero;
    }

    /**
     * Set colegioArquitectoNumero
     *
     * @param integer $colegioArquitectoNumero
     *
     * @return Obra
     */
    public function setColegioArquitectoNumero($colegioArquitectoNumero)
    {
        $this->colegioArquitectoNumero = $colegioArquitectoNumero;

        return $this;
    }

    /**
     * Get colegioArquitectoNumero
     *
     * @return integer
     */
    public function getColegioArquitectoNumero()
    {
        return $this->colegioArquitectoNumero;
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
     * Set idPersona
     *
     * @param \AppBundle\Entity\Persona $idPersona
     *
     * @return Obra
     */
    public function setIdPersona(\AppBundle\Entity\Persona $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }
}
