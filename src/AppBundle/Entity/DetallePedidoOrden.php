<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetallePedidoOrden
 *
 * @ORM\Table(name="detalle_pedido_orden", indexes={@ORM\Index(name="id_pedido", columns={"id_pedido"}), @ORM\Index(name="id_orden", columns={"id_orden"})})
 * @ORM\Entity
 */
class DetallePedidoOrden
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
     * @var \AppBundle\Entity\OrdenCompra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OrdenCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_orden", referencedColumnName="id")
     * })
     */
    private $idOrden;

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

