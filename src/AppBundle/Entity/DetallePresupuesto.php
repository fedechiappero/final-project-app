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


}

