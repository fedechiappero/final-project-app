<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleRevision
 *
 * @ORM\Table(name="detalle_revision")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetalleRevisionRepository")
 */
class DetalleRevision
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
     * @ORM\Column(name="id_revision", type="integer")
     */
    private $idRevision;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tipo_revision", type="integer")
     */
    private $idTipoRevision;

    /**
     * @var int
     *
     * @ORM\Column(name="id_estado_revision", type="integer")
     */
    private $idEstadoRevision;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;


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
     * Set idRevision
     *
     * @param integer $idRevision
     *
     * @return DetalleRevision
     */
    public function setIdRevision($idRevision)
    {
        $this->idRevision = $idRevision;

        return $this;
    }

    /**
     * Get idRevision
     *
     * @return int
     */
    public function getIdRevision()
    {
        return $this->idRevision;
    }

    /**
     * Set idTipoRevision
     *
     * @param integer $idTipoRevision
     *
     * @return DetalleRevision
     */
    public function setIdTipoRevision($idTipoRevision)
    {
        $this->idTipoRevision = $idTipoRevision;

        return $this;
    }

    /**
     * Get idTipoRevision
     *
     * @return int
     */
    public function getIdTipoRevision()
    {
        return $this->idTipoRevision;
    }

    /**
     * Set idEstadoRevision
     *
     * @param integer $idEstadoRevision
     *
     * @return DetalleRevision
     */
    public function setIdEstadoRevision($idEstadoRevision)
    {
        $this->idEstadoRevision = $idEstadoRevision;

        return $this;
    }

    /**
     * Get idEstadoRevision
     *
     * @return int
     */
    public function getIdEstadoRevision()
    {
        return $this->idEstadoRevision;
    }

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
}

