<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Obra
 *
 * @ORM\Table(name="obra")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObraRepository")
 */
class Obra
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_persona", type="integer")
     */
    private $idPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date")
     */
    private $fechaInicio;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255)
     */
    private $foto;

    /**
     * @var int
     *
     * @ORM\Column(name="legajo_municipal_numero", type="integer")
     */
    private $legajoMunicipalNumero;

    /**
     * @var int
     *
     * @ORM\Column(name="colegio_arquitecto_numero", type="integer")
     */
    private $colegioArquitectoNumero;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPersona
     *
     * @param integer $idPersona
     *
     * @return Obra
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return int
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

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
     * @return int
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
     * @return int
     */
    public function getColegioArquitectoNumero()
    {
        return $this->colegioArquitectoNumero;
    }
}

