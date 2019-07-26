<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChequeTercero
 *
 * @ORM\Table(name="cheque_tercero", indexes={@ORM\Index(name="id_banco", columns={"id_banco"})})
 * @ORM\Entity
 */
class ChequeTercero
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
     * @ORM\Column(name="cuit_titular", type="string", length=255, nullable=false)
     */
    private $cuitTitular;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_titular", type="string", length=255, nullable=false)
     */
    private $nombreTitular;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_cobro", type="date", nullable=false)
     */
    private $fechaCobro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="date", nullable=false)
     */
    private $fechaEmision;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_recibido", type="date", nullable=false)
     */
    private $fechaRecibido;

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
     * @return ChequeTercero
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
     * Set cuitTitular
     *
     * @param string $cuitTitular
     *
     * @return ChequeTercero
     */
    public function setCuitTitular($cuitTitular)
    {
        $this->cuitTitular = $cuitTitular;

        return $this;
    }

    /**
     * Get cuitTitular
     *
     * @return string
     */
    public function getCuitTitular()
    {
        return $this->cuitTitular;
    }

    /**
     * Set nombreTitular
     *
     * @param string $nombreTitular
     *
     * @return ChequeTercero
     */
    public function setNombreTitular($nombreTitular)
    {
        $this->nombreTitular = $nombreTitular;

        return $this;
    }

    /**
     * Get nombreTitular
     *
     * @return string
     */
    public function getNombreTitular()
    {
        return $this->nombreTitular;
    }

    /**
     * Set fechaCobro
     *
     * @param \DateTime $fechaCobro
     *
     * @return ChequeTercero
     */
    public function setFechaCobro($fechaCobro)
    {
        $this->fechaCobro = $fechaCobro;

        return $this;
    }

    /**
     * Get fechaCobro
     *
     * @return \DateTime
     */
    public function getFechaCobro()
    {
        return $this->fechaCobro;
    }

    /**
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     *
     * @return ChequeTercero
     */
    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    /**
     * Get fechaEmision
     *
     * @return \DateTime
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set fechaRecibido
     *
     * @param \DateTime $fechaRecibido
     *
     * @return ChequeTercero
     */
    public function setFechaRecibido($fechaRecibido)
    {
        $this->fechaRecibido = $fechaRecibido;

        return $this;
    }

    /**
     * Get fechaRecibido
     *
     * @return \DateTime
     */
    public function getFechaRecibido()
    {
        return $this->fechaRecibido;
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
     * @return ChequeTercero
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
