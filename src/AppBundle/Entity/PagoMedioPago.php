<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PagoMedioPago
 *
 * @ORM\Table(name="pago_medio_pago")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PagoMedioPagoRepository")
 */
class PagoMedioPago
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
     * @ORM\Column(name="id_pago", type="integer")
     */
    private $idPago;

    /**
     * @var int
     *
     * @ORM\Column(name="id_medio_pago", type="integer")
     */
    private $idMedioPago;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float")
     */
    private $importe;


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
     * Set idPago
     *
     * @param integer $idPago
     *
     * @return PagoMedioPago
     */
    public function setIdPago($idPago)
    {
        $this->idPago = $idPago;

        return $this;
    }

    /**
     * Get idPago
     *
     * @return int
     */
    public function getIdPago()
    {
        return $this->idPago;
    }

    /**
     * Set idMedioPago
     *
     * @param integer $idMedioPago
     *
     * @return PagoMedioPago
     */
    public function setIdMedioPago($idMedioPago)
    {
        $this->idMedioPago = $idMedioPago;

        return $this;
    }

    /**
     * Get idMedioPago
     *
     * @return int
     */
    public function getIdMedioPago()
    {
        return $this->idMedioPago;
    }

    /**
     * Set importe
     *
     * @param float $importe
     *
     * @return PagoMedioPago
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float
     */
    public function getImporte()
    {
        return $this->importe;
    }
}

