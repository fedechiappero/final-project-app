<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transferencia
 *
 * @ORM\Table(name="transferencia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TransferenciaRepository")
 */
class Transferencia
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
     * @ORM\Column(name="id_banco", type="integer")
     */
    private $idBanco;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="titular", type="string", length=255)
     */
    private $titular;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=255)
     */
    private $cuit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
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
     * Set idBanco
     *
     * @param integer $idBanco
     *
     * @return Transferencia
     */
    public function setIdBanco($idBanco)
    {
        $this->idBanco = $idBanco;

        return $this;
    }

    /**
     * Get idBanco
     *
     * @return int
     */
    public function getIdBanco()
    {
        return $this->idBanco;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Transferencia
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set titular
     *
     * @param string $titular
     *
     * @return Transferencia
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;

        return $this;
    }

    /**
     * Get titular
     *
     * @return string
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     *
     * @return Transferencia
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return string
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Transferencia
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

