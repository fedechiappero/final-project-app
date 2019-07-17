<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetallePresupuesto
 *
 * @ORM\Table(name="detalle_presupuesto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetallePresupuestoRepository")
 */
class DetallePresupuesto
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
     * @ORM\Column(name="id_sitiotarea", type="integer")
     */
    private $idSitiotarea;

    /**
     * @var int
     *
     * @ORM\Column(name="id_presupuesto", type="integer")
     */
    private $idPresupuesto;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="subtotal", type="float")
     */
    private $subtotal;


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
     * Set idSitiotarea
     *
     * @param integer $idSitiotarea
     *
     * @return DetallePresupuesto
     */
    public function setIdSitiotarea($idSitiotarea)
    {
        $this->idSitiotarea = $idSitiotarea;

        return $this;
    }

    /**
     * Get idSitiotarea
     *
     * @return int
     */
    public function getIdSitiotarea()
    {
        return $this->idSitiotarea;
    }

    /**
     * Set idPresupuesto
     *
     * @param integer $idPresupuesto
     *
     * @return DetallePresupuesto
     */
    public function setIdPresupuesto($idPresupuesto)
    {
        $this->idPresupuesto = $idPresupuesto;

        return $this;
    }

    /**
     * Get idPresupuesto
     *
     * @return int
     */
    public function getIdPresupuesto()
    {
        return $this->idPresupuesto;
    }

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
     * @return int
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
}

