<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetallePedido
 *
 * @ORM\Table(name="detalle_pedido", indexes={@ORM\Index(name="id_pedido", columns={"id_pedido"}), @ORM\Index(name="id_producto", columns={"id_producto"})})
 * @ORM\Entity
 */
class DetallePedido
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Producto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_producto", referencedColumnName="id")
     * })
     */
    private $idProducto;

    /**
     * @var \AppBundle\Entity\Pedido
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
     * })
     */
    private $idPedido;


}

