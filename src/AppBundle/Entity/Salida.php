<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salida
 *
 * @ORM\Table(name="salida", indexes={@ORM\Index(name="id_destino", columns={"id_destino"}), @ORM\Index(name="id_cheque", columns={"id_cheque"})})
 * @ORM\Entity
 */
class Salida
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
     * @var \AppBundle\Entity\ChequeTercero
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ChequeTercero")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cheque", referencedColumnName="id")
     * })
     */
    private $idCheque;

    /**
     * @var \AppBundle\Entity\Destino
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Destino")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_destino", referencedColumnName="id")
     * })
     */
    private $idDestino;



    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Salida
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
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
     * Set idCheque
     *
     * @param \AppBundle\Entity\ChequeTercero $idCheque
     *
     * @return Salida
     */
    public function setIdCheque(\AppBundle\Entity\ChequeTercero $idCheque = null)
    {
        $this->idCheque = $idCheque;

        return $this;
    }

    /**
     * Get idCheque
     *
     * @return \AppBundle\Entity\ChequeTercero
     */
    public function getIdCheque()
    {
        return $this->idCheque;
    }

    /**
     * Set idDestino
     *
     * @param \AppBundle\Entity\Destino $idDestino
     *
     * @return Salida
     */
    public function setIdDestino(\AppBundle\Entity\Destino $idDestino = null)
    {
        $this->idDestino = $idDestino;

        return $this;
    }

    /**
     * Get idDestino
     *
     * @return \AppBundle\Entity\Destino
     */
    public function getIdDestino()
    {
        return $this->idDestino;
    }
}
