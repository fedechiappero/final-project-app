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



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return SitioTarea
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
     * Set unidad
     *
     * @param string $unidad
     *
     * @return SitioTarea
     */
    public function setUnidad($unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get unidad
     *
     * @return string
     */
    public function getUnidad()
    {
        return $this->unidad;
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
     * Set idPrecio
     *
     * @param \AppBundle\Entity\PrecioSitioTarea $idPrecio
     *
     * @return SitioTarea
     */
    public function setIdPrecio(\AppBundle\Entity\PrecioSitioTarea $idPrecio = null)
    {
        $this->idPrecio = $idPrecio;

        return $this;
    }

    /**
     * Get idPrecio
     *
     * @return \AppBundle\Entity\PrecioSitioTarea
     */
    public function getIdPrecio()
    {
        return $this->idPrecio;
    }
}
