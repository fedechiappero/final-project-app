<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chequera
 *
 * @ORM\Table(name="chequera", indexes={@ORM\Index(name="id_cuenta_banco", columns={"id_cuenta_banco"})})
 * @ORM\Entity
 */
class Chequera
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero_inicial", type="integer", nullable=false)
     */
    private $numeroInicial;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_cheques", type="integer", nullable=false)
     */
    private $cantidadCheques;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activa", type="boolean", nullable=false)
     */
    private $activa;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\CuentaBanco
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CuentaBanco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cuenta_banco", referencedColumnName="id")
     * })
     */
    private $idCuentaBanco;



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
     * @return integer
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
     * @return integer
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
     * @return boolean
     */
    public function getActiva()
    {
        return $this->activa;
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
     * Set idCuentaBanco
     *
     * @param \AppBundle\Entity\CuentaBanco $idCuentaBanco
     *
     * @return Chequera
     */
    public function setIdCuentaBanco(\AppBundle\Entity\CuentaBanco $idCuentaBanco = null)
    {
        $this->idCuentaBanco = $idCuentaBanco;

        return $this;
    }

    /**
     * Get idCuentaBanco
     *
     * @return \AppBundle\Entity\CuentaBanco
     */
    public function getIdCuentaBanco()
    {
        return $this->idCuentaBanco;
    }
}
