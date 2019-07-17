<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleTransferencia
 *
 * @ORM\Table(name="detalle_transferencia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetalleTransferenciaRepository")
 */
class DetalleTransferencia
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
     * @ORM\Column(name="id_transferencia", type="integer")
     */
    private $idTransferencia;


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
     * @return DetalleTransferencia
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
     * Set idTransferencia
     *
     * @param integer $idTransferencia
     *
     * @return DetalleTransferencia
     */
    public function setIdTransferencia($idTransferencia)
    {
        $this->idTransferencia = $idTransferencia;

        return $this;
    }

    /**
     * Get idTransferencia
     *
     * @return int
     */
    public function getIdTransferencia()
    {
        return $this->idTransferencia;
    }
}

