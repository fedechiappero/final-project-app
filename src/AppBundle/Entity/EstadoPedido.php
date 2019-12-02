<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoPedido
 *
 * @ORM\Table(name="estado_pedido", indexes={@ORM\Index(name="IDX_97557E78E2DBA323", columns={"id_pedido"}), @ORM\Index(name="IDX_97557E786A540E", columns={"id_estado"})})
 * @ORM\Entity
 */
class EstadoPedido
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Pedido
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
     * })
     */
    private $idPedido;

    /**
     * @var \AppBundle\Entity\Estado
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id")
     * })
     */
    private $idEstado;


}

