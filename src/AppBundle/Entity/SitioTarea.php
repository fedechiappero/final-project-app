<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SitioTarea
 *
 * @ORM\Table(name="sitio_tarea")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SitioTareaRepository")
 */
class SitioTarea
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad", type="string", length=255)
     */
    private $unidad;

    /**
     * @var int
     *
     * @ORM\Column(name="id_precio", type="integer")
     */
    private $idPrecio;


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
     * Set idPrecio
     *
     * @param integer $idPrecio
     *
     * @return SitioTarea
     */
    public function setIdPrecio($idPrecio)
    {
        $this->idPrecio = $idPrecio;

        return $this;
    }

    /**
     * Get idPrecio
     *
     * @return int
     */
    public function getIdPrecio()
    {
        return $this->idPrecio;
    }
}

