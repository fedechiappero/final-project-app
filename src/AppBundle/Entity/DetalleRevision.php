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



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return DetalleRevision
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return DetalleRevision
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
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
     * Set idEstadoRevision
     *
     * @param \AppBundle\Entity\EstadoRevision $idEstadoRevision
     *
     * @return DetalleRevision
     */
    public function setIdEstadoRevision(\AppBundle\Entity\EstadoRevision $idEstadoRevision = null)
    {
        $this->idEstadoRevision = $idEstadoRevision;

        return $this;
    }

    /**
     * Get idEstadoRevision
     *
     * @return \AppBundle\Entity\EstadoRevision
     */
    public function getIdEstadoRevision()
    {
        return $this->idEstadoRevision;
    }

    /**
     * Set idTipoRevision
     *
     * @param \AppBundle\Entity\TipoRevision $idTipoRevision
     *
     * @return DetalleRevision
     */
    public function setIdTipoRevision(\AppBundle\Entity\TipoRevision $idTipoRevision = null)
    {
        $this->idTipoRevision = $idTipoRevision;

        return $this;
    }

    /**
     * Get idTipoRevision
     *
     * @return \AppBundle\Entity\TipoRevision
     */
    public function getIdTipoRevision()
    {
        return $this->idTipoRevision;
    }

    /**
     * Set idRevision
     *
     * @param \AppBundle\Entity\Revision $idRevision
     *
     * @return DetalleRevision
     */
    public function setIdRevision(\AppBundle\Entity\Revision $idRevision = null)
    {
        $this->idRevision = $idRevision;

        return $this;
    }

    /**
     * Get idRevision
     *
     * @return \AppBundle\Entity\Revision
     */
    public function getIdRevision()
    {
        return $this->idRevision;
    }
}
