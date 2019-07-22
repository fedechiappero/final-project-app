<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", indexes={@ORM\Index(name="id_contratista_obra", columns={"id_contratista_obra"})})
 * @ORM\Entity
 */
class Pedido
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
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="necesario_para_fecha", type="datetime", nullable=false)
     */
    private $necesarioParaFecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\ContratistaObra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ContratistaObra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contratista_obra", referencedColumnName="id")
     * })
     */
    private $idContratistaObra;


}

