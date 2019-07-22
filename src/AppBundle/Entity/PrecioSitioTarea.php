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


}

