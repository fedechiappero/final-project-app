<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transferencia
 *
 * @ORM\Table(name="transferencia", indexes={@ORM\Index(name="id_banco", columns={"id_banco"})})
 * @ORM\Entity
 */
class Transferencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="titular", type="string", length=255, nullable=false)
     */
    private $titular;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=255, nullable=false)
     */
    private $cuit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
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
     * @var \AppBundle\Entity\Banco
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Banco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_banco", referencedColumnName="id")
     * })
     */
    private $idBanco;



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
     * @return integer
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
     * Set idBanco
     *
     * @param \AppBundle\Entity\Banco $idBanco
     *
     * @return Transferencia
     */
    public function setIdBanco(\AppBundle\Entity\Banco $idBanco = null)
    {
        $this->idBanco = $idBanco;

        return $this;
    }

    /**
     * Get idBanco
     *
     * @return \AppBundle\Entity\Banco
     */
    public function getIdBanco()
    {
        return $this->idBanco;
    }
}
