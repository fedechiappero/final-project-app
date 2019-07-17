<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PedidoRepository")
 */
class Pedido
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
     * @ORM\Column(name="id_contratista_obra", type="integer")
     */
    private $idContratistaObra;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="necesario_para_fecha", type="datetime")
     */
    private $necesarioParaFecha;


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
     * Set idContratistaObra
     *
     * @param integer $idContratistaObra
     *
     * @return Pedido
     */
    public function setIdContratistaObra($idContratistaObra)
    {
        $this->idContratistaObra = $idContratistaObra;

        return $this;
    }

    /**
     * Get idContratistaObra
     *
     * @return int
     */
    public function getIdContratistaObra()
    {
        return $this->idContratistaObra;
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
     * @return int
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
}

