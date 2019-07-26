<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inmueble
 *
 * @ORM\Table(name="inmueble", indexes={@ORM\Index(name="id_obra", columns={"id_obra"}), @ORM\Index(name="id_tipo", columns={"id_tipo"})})
 * @ORM\Entity
 */
class Inmueble
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\TipoInmueble
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TipoInmueble")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo", referencedColumnName="id")
     * })
     */
    private $idTipo;

    /**
     * @var \AppBundle\Entity\Obra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Obra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_obra", referencedColumnName="id")
     * })
     */
    private $idObra;



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Inmueble
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idTipo
     *
     * @param \AppBundle\Entity\TipoInmueble $idTipo
     *
     * @return Inmueble
     */
    public function setIdTipo(\AppBundle\Entity\TipoInmueble $idTipo = null)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * Get idTipo
     *
     * @return \AppBundle\Entity\TipoInmueble
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * Set idObra
     *
     * @param \AppBundle\Entity\Obra $idObra
     *
     * @return Inmueble
     */
    public function setIdObra(\AppBundle\Entity\Obra $idObra = null)
    {
        $this->idObra = $idObra;

        return $this;
    }

    /**
     * Get idObra
     *
     * @return \AppBundle\Entity\Obra
     */
    public function getIdObra()
    {
        return $this->idObra;
    }
}
