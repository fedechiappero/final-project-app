<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrecioSitioTarea
 *
 * @ORM\Table(name="precio_sitio_tarea")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrecioSitioTareaRepository")
 */
class PrecioSitioTarea
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
     * @var float
     *
     * @ORM\Column(name="material", type="float")
     */
    private $material;

    /**
     * @var float
     *
     * @ORM\Column(name="mano_obra", type="float")
     */
    private $manoObra;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ultima_actualizacion", type="datetime")
     */
    private $ultimaActualizacion;


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
     * Set material
     *
     * @param float $material
     *
     * @return PrecioSitioTarea
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return float
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set manoObra
     *
     * @param float $manoObra
     *
     * @return PrecioSitioTarea
     */
    public function setManoObra($manoObra)
    {
        $this->manoObra = $manoObra;

        return $this;
    }

    /**
     * Get manoObra
     *
     * @return float
     */
    public function getManoObra()
    {
        return $this->manoObra;
    }

    /**
     * Set ultimaActualizacion
     *
     * @param \DateTime $ultimaActualizacion
     *
     * @return PrecioSitioTarea
     */
    public function setUltimaActualizacion($ultimaActualizacion)
    {
        $this->ultimaActualizacion = $ultimaActualizacion;

        return $this;
    }

    /**
     * Get ultimaActualizacion
     *
     * @return \DateTime
     */
    public function getUltimaActualizacion()
    {
        return $this->ultimaActualizacion;
    }
}

