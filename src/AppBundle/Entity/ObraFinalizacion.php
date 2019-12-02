<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObraFinalizacion
 *
 * @ORM\Table(name="obra_finalizacion", indexes={@ORM\Index(name="id_obra", columns={"id_obra"})})
 * @ORM\Entity
 */
class ObraFinalizacion
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Obra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Obra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_obra", referencedColumnName="id")
     * })
     */
    private $idObra;


}

