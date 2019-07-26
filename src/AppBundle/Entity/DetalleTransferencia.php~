<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleTransferencia
 *
 * @ORM\Table(name="detalle_transferencia", indexes={@ORM\Index(name="id_pago", columns={"id_pago"}), @ORM\Index(name="id_transferencia", columns={"id_transferencia"})})
 * @ORM\Entity
 */
class DetalleTransferencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Transferencia
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Transferencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_transferencia", referencedColumnName="id")
     * })
     */
    private $idTransferencia;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idTransferencia
     *
     * @param \AppBundle\Entity\Transferencia $idTransferencia
     *
     * @return DetalleTransferencia
     */
    public function setIdTransferencia(\AppBundle\Entity\Transferencia $idTransferencia = null)
    {
        $this->idTransferencia = $idTransferencia;

        return $this;
    }

    /**
     * Get idTransferencia
     *
     * @return \AppBundle\Entity\Transferencia
     */
    public function getIdTransferencia()
    {
        return $this->idTransferencia;
    }

    /**
     * Set idPago
     *
     * @param \AppBundle\Entity\Pago $idPago
     *
     * @return DetalleTransferencia
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
