<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salida
 *
 * @ORM\Table(name="salida")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalidaRepository")
 */
class Salida
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
     * @ORM\Column(name="id_destino", type="integer")
     */
    private $idDestino;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cheque", type="integer")
     */
    private $idCheque;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;


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
     * Set idDestino
     *
     * @param integer $idDestino
     *
     * @return Salida
     */
    public function setIdDestino($idDestino)
    {
        $this->idDestino = $idDestino;

        return $this;
    }

    /**
     * Get idDestino
     *
     * @return int
     */
    public function getIdDestino()
    {
        return $this->idDestino;
    }

    /**
     * Set idCheque
     *
     * @param integer $idCheque
     *
     * @return Salida
     */
    public function setIdCheque($idCheque)
    {
        $this->idCheque = $idCheque;

        return $this;
    }

    /**
     * Get idCheque
     *
     * @return int
     */
    public function getIdCheque()
    {
        return $this->idCheque;
    }

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
}

