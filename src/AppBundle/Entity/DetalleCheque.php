<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleCheque
 *
 * @ORM\Table(name="detalle_cheque", indexes={@ORM\Index(name="id_pago", columns={"id_pago"}), @ORM\Index(name="id_cheque", columns={"id_cheque"})})
 * @ORM\Entity
 */
class DetalleCheque
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
     * @var \AppBundle\Entity\ChequeTercero
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ChequeTercero")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cheque", referencedColumnName="id")
     * })
     */
    private $idCheque;

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
     * Set idCheque
     *
     * @param \AppBundle\Entity\ChequeTercero $idCheque
     *
     * @return DetalleCheque
     */
    public function setIdCheque(\AppBundle\Entity\ChequeTercero $idCheque = null)
    {
        $this->idCheque = $idCheque;

        return $this;
    }

    /**
     * Get idCheque
     *
     * @return \AppBundle\Entity\ChequeTercero
     */
    public function getIdCheque()
    {
        return $this->idCheque;
    }

    /**
     * Set idPago
     *
     * @param \AppBundle\Entity\Pago $idPago
     *
     * @return DetalleCheque
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
