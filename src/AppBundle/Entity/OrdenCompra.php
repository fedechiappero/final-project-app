<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdenCompra
 *
 * @ORM\Table(name="orden_compra", indexes={@ORM\Index(name="id_obra", columns={"id_obra"}), @ORM\Index(name="id_proveedor", columns={"id_proveedor"}), @ORM\Index(name="id_enc_comp", columns={"id_enc_comp"})})
 * @ORM\Entity
 */
class OrdenCompra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="date", nullable=false)
     */
    private $fechaEmision;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=false)
     */
    private $total;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Proveedor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Proveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
     * })
     */
    private $idProveedor;

    /**
     * @var \AppBundle\Entity\EncCompMatCons
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EncCompMatCons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_enc_comp", referencedColumnName="id")
     * })
     */
    private $idEncComp;

    /**
     * @var \AppBundle\Entity\Obra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Obra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_obra", referencedColumnName="id")
     * })
     */
    private $idObra;


}

