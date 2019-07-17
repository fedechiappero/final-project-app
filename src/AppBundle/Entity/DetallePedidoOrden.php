<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetallePedidoOrden
 *
 * @ORM\Table(name="detalle_pedido_orden")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetallePedidoOrdenRepository")
 */
class DetallePedidoOrden
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
     * @ORM\Column(name="id_pedido", type="integer")
     */
    private $idPedido;

    /**
     * @var int
     *
     * @ORM\Column(name="id_orden", type="integer")
     */
    private $idOrden;


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
     * Set idPedido
     *
     * @param integer $idPedido
     *
     * @return DetallePedidoOrden
     */
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;

        return $this;
    }

    /**
     * Get idPedido
     *
     * @return int
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set idOrden
     *
     * @param integer $idOrden
     *
     * @return DetallePedidoOrden
     */
    public function setIdOrden($idOrden)
    {
        $this->idOrden = $idOrden;

        return $this;
    }

    /**
     * Get idOrden
     *
     * @return int
     */
    public function getIdOrden()
    {
        return $this->idOrden;
    }
}

