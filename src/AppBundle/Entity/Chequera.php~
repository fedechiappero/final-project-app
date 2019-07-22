<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chequera
 *
 * @ORM\Table(name="chequera", indexes={@ORM\Index(name="id_cuenta_banco", columns={"id_cuenta_banco"})})
 * @ORM\Entity
 */
class Chequera
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero_inicial", type="integer", nullable=false)
     */
    private $numeroInicial;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_cheques", type="integer", nullable=false)
     */
    private $cantidadCheques;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activa", type="boolean", nullable=false)
     */
    private $activa;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\CuentaBanco
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CuentaBanco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cuenta_banco", referencedColumnName="id")
     * })
     */
    private $idCuentaBanco;


}

