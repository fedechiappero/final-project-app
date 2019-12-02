<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleRevision
 *
 * @ORM\Table(name="detalle_revision", indexes={@ORM\Index(name="id_revision", columns={"id_revision"}), @ORM\Index(name="id_tipo_revision", columns={"id_tipo_revision"}), @ORM\Index(name="id_estado_revision", columns={"id_estado_revision"})})
 * @ORM\Entity
 */
class DetalleRevision
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=false)
     */
    private $hora;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\EstadoRevision
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EstadoRevision")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_revision", referencedColumnName="id")
     * })
     */
    private $idEstadoRevision;

    /**
     * @var \AppBundle\Entity\TipoRevision
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TipoRevision")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_revision", referencedColumnName="id")
     * })
     */
    private $idTipoRevision;

    /**
     * @var \AppBundle\Entity\Revision
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Revision")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_revision", referencedColumnName="id")
     * })
     */
    private $idRevision;


}

