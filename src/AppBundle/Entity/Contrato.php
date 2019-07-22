<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrato
 *
 * @ORM\Table(name="contrato", indexes={@ORM\Index(name="id_obra", columns={"id_obra"}), @ORM\Index(name="id_presupuesto", columns={"id_presupuesto"})})
 * @ORM\Entity
 */
class Contrato
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="datetime", nullable=false)
     */
    private $fechaEmision;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_nombre", type="string", length=255, nullable=false)
     */
    private $arquitectoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_matricula", type="string", length=255, nullable=false)
     */
    private $arquitectoMatricula;

    /**
     * @var string
     *
     * @ORM\Column(name="arquitecto_domicilio", type="string", length=255, nullable=false)
     */
    private $arquitectoDomicilio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_estimada_inicio", type="date", nullable=false)
     */
    private $fechaEstimadaInicio;

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
     * @var \AppBundle\Entity\Obra
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Obra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_obra", referencedColumnName="id")
     * })
     */
    private $idObra;


}

