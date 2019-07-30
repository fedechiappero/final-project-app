<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DetallePedido", mappedBy="idPedido", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $detallepedido;

    public function __construct()
    {
        $this->detallepedido = new ArrayCollection();
    }

    public function getDetallePedido()
    {
        return $this->detallepedido->toArray();
    }

    public function addDetallePedido(DetallePedido $detallepedido)
    {
        if (!$this->detallepedido->contains($detallepedido)) {
            $this->detallepedido->add($detallepedido);
            $detallepedido->setIdPedido($this);
        }

        return $this;
    }
    
    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Pedido
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Pedido
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set necesarioParaFecha
     *
     * @param \DateTime $necesarioParaFecha
     *
     * @return Pedido
     */
    public function setNecesarioParaFecha($necesarioParaFecha)
    {
        $this->necesarioParaFecha = $necesarioParaFecha;

        return $this;
    }

    /**
     * Get necesarioParaFecha
     *
     * @return \DateTime
     */
    public function getNecesarioParaFecha()
    {
        return $this->necesarioParaFecha;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idContratistaObra
     *
     * @param \AppBundle\Entity\ContratistaObra $idContratistaObra
     *
     * @return Pedido
     */
    public function setIdContratistaObra(\AppBundle\Entity\ContratistaObra $idContratistaObra = null)
    {
        $this->idContratistaObra = $idContratistaObra;

        return $this;
    }

    /**
     * Get idContratistaObra
     *
     * @return \AppBundle\Entity\ContratistaObra
     */
    public function getIdContratistaObra()
    {
        return $this->idContratistaObra;
    }
}
