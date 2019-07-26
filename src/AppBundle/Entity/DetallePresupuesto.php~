<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetallePresupuesto
 *
 * @ORM\Table(name="detalle_presupuesto", indexes={@ORM\Index(name="id_sitiotarea", columns={"id_sitiotarea"}), @ORM\Index(name="id_presupuesto", columns={"id_presupuesto"})})
 * @ORM\Entity
 */
class DetallePresupuesto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="subtotal", type="float", precision=10, scale=0, nullable=false)
     */
    private $subtotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Presupuesto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Presupuesto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_presupuesto", referencedColumnName="id")
     * })
     */
    private $idPresupuesto;

    /**
     * @var \AppBundle\Entity\SitioTarea
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SitioTarea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sitiotarea", referencedColumnName="id")
     * })
     */
    private $idSitiotarea;



    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return DetallePresupuesto
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set subtotal
     *
     * @param float $subtotal
     *
     * @return DetallePresupuesto
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
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
     * Set idPresupuesto
     *
     * @param \AppBundle\Entity\Presupuesto $idPresupuesto
     *
     * @return DetallePresupuesto
     */
    public function setIdPresupuesto(\AppBundle\Entity\Presupuesto $idPresupuesto = null)
    {
        $this->idPresupuesto = $idPresupuesto;

        return $this;
    }

    /**
     * Get idPresupuesto
     *
     * @return \AppBundle\Entity\Presupuesto
     */
    public function getIdPresupuesto()
    {
        return $this->idPresupuesto;
    }

    /**
     * Set idSitiotarea
     *
     * @param \AppBundle\Entity\SitioTarea $idSitiotarea
     *
     * @return DetallePresupuesto
     */
    public function setIdSitiotarea(\AppBundle\Entity\SitioTarea $idSitiotarea = null)
    {
        $this->idSitiotarea = $idSitiotarea;

        return $this;
    }

    /**
     * Get idSitiotarea
     *
     * @return \AppBundle\Entity\SitioTarea
     */
    public function getIdSitiotarea()
    {
        return $this->idSitiotarea;
    }
}
