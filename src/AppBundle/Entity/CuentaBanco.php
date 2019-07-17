<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CuentaBanco
 *
 * @ORM\Table(name="cuenta_banco")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CuentaBancoRepository")
 */
class CuentaBanco
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
     * @var int
     *
     * @ORM\Column(name="cbu", type="integer")
     */
    private $cbu;

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
     * Set idBanco
     *
     * @param integer $idBanco
     *
     * @return CuentaBanco
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
     * @return int
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
     * @return int
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
     * @return bool
     */
    public function getActiva()
    {
        return $this->activa;
    }
}

