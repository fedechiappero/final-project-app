<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CuentaBanco
 *
 * @ORM\Table(name="cuenta_banco", indexes={@ORM\Index(name="id_banco", columns={"id_banco"})})
 * @ORM\Entity
 */
class CuentaBanco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="cbu", type="integer", nullable=false)
     */
    private $cbu;

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
     * @return CuentaBanco
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
     * Set cbu
     *
     * @param integer $cbu
     *
     * @return CuentaBanco
     */
    public function setCbu($cbu)
    {
        $this->cbu = $cbu;

        return $this;
    }

    /**
     * Get cbu
     *
     * @return integer
     */
    public function getCbu()
    {
        return $this->cbu;
    }

    /**
     * Set activa
     *
     * @param boolean $activa
     *
     * @return CuentaBanco
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
     * Set idBanco
     *
     * @param \AppBundle\Entity\Banco $idBanco
     *
     * @return CuentaBanco
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
