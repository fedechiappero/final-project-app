<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chequera
 *
 * @ORM\Table(name="chequera")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChequeraRepository")
 */
class Chequera
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
     * @ORM\Column(name="id_cuenta_banco", type="integer")
     */
    private $idCuentaBanco;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_inicial", type="integer")
     */
    private $numeroInicial;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad_cheques", type="integer")
     */
    private $cantidadCheques;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var bool
     *
     * @ORM\Column(name="activa", type="boolean")
     */
    private $activa;


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
     * Set idCuentaBanco
     *
     * @param integer $idCuentaBanco
     *
     * @return Chequera
     */
    public function setIdCuentaBanco($idCuentaBanco)
    {
        $this->idCuentaBanco = $idCuentaBanco;

        return $this;
    }

    /**
     * Get idCuentaBanco
     *
     * @return int
     */
    public function getIdCuentaBanco()
    {
        return $this->idCuentaBanco;
    }

    /**
     * Set numeroInicial
     *
     * @param integer $numeroInicial
     *
     * @return Chequera
     */
    public function setNumeroInicial($numeroInicial)
    {
        $this->numeroInicial = $numeroInicial;

        return $this;
    }

    /**
     * Get numeroInicial
     *
     * @return int
     */
    public function getNumeroInicial()
    {
        return $this->numeroInicial;
    }

    /**
     * Set cantidadCheques
     *
     * @param integer $cantidadCheques
     *
     * @return Chequera
     */
    public function setCantidadCheques($cantidadCheques)
    {
        $this->cantidadCheques = $cantidadCheques;

        return $this;
    }

    /**
     * Get cantidadCheques
     *
     * @return int
     */
    public function getCantidadCheques()
    {
        return $this->cantidadCheques;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Chequera
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
     * Set activa
     *
     * @param boolean $activa
     *
     * @return Chequera
     */
    public function setActiva($activa)
    {
        $this->activa = $activa;

        return $this;
    }

    /**
     * Get activa
     *
     * @return bool
     */
    public function getActiva()
    {
        return $this->activa;
    }
}

