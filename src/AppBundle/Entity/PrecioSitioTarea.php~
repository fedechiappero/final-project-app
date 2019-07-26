<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrecioSitioTarea
 *
 * @ORM\Table(name="precio_sitio_tarea")
 * @ORM\Entity
 */
class PrecioSitioTarea
{
    /**
     * @var float
     *
     * @ORM\Column(name="material", type="float", precision=10, scale=0, nullable=false)
     */
    private $material;

    /**
     * @var float
     *
     * @ORM\Column(name="mano_obra", type="float", precision=10, scale=0, nullable=false)
     */
    private $manoObra;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ultima_actualizacion", type="datetime", nullable=false)
     */
    private $ultimaActualizacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



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

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
