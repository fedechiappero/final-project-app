<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PagoMedioPago
 *
 * @ORM\Table(name="pago_medio_pago", indexes={@ORM\Index(name="id_pago", columns={"id_pago"}), @ORM\Index(name="id_medio_pago", columns={"id_medio_pago"})})
 * @ORM\Entity
 */
class PagoMedioPago
{
    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=0, nullable=false)
     */
    private $importe;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\MedioPago
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MedioPago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_medio_pago", referencedColumnName="id")
     * })
     */
    private $idMedioPago;

    /**
     * @var \AppBundle\Entity\Pago
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pago", referencedColumnName="id")
     * })
     */
    private $idPago;



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
     * Set idMedioPago
     *
     * @param \AppBundle\Entity\MedioPago $idMedioPago
     *
     * @return PagoMedioPago
     */
    public function setIdMedioPago(\AppBundle\Entity\MedioPago $idMedioPago = null)
    {
        $this->idMedioPago = $idMedioPago;

        return $this;
    }

    /**
     * Get idMedioPago
     *
     * @return \AppBundle\Entity\MedioPago
     */
    public function getIdMedioPago()
    {
        return $this->idMedioPago;
    }

    /**
     * Set idPago
     *
     * @param \AppBundle\Entity\Pago $idPago
     *
     * @return PagoMedioPago
     */
    public function setIdPago(\AppBundle\Entity\Pago $idPago = null)
    {
        $this->idPago = $idPago;

        return $this;
    }

    /**
     * Get idPago
     *
     * @return \AppBundle\Entity\Pago
     */
    public function getIdPago()
    {
        return $this->idPago;
    }
}
