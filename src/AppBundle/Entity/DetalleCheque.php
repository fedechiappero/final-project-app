<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleCheque
 *
 * @ORM\Table(name="detalle_cheque")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetalleChequeRepository")
 */
class DetalleCheque
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
     * @ORM\Column(name="id_cheque", type="integer")
     */
    private $idCheque;


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
     * @return DetalleCheque
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
     * Set idCheque
     *
     * @param integer $idCheque
     *
     * @return DetalleCheque
     */
    public function setIdCheque($idCheque)
    {
        $this->idCheque = $idCheque;

        return $this;
    }

    /**
     * Get idCheque
     *
     * @return int
     */
    public function getIdCheque()
    {
        return $this->idCheque;
    }
}

