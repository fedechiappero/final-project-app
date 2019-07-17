<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdenCompra
 *
 * @ORM\Table(name="orden_compra")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdenCompraRepository")
 */
class OrdenCompra
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
     * @ORM\Column(name="id_usuario", type="integer")
     */
    private $idUsuario;

    /**
     * @var int
     *
     * @ORM\Column(name="id_obra", type="integer")
     */
    private $idObra;

    /**
     * @var int
     *
     * @ORM\Column(name="id_proveedor", type="integer")
     */
    private $idProveedor;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="date")
     */
    private $fechaEmision;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;


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
     * Set idUsuario
     *
     * @param integer $idUsuario
     *
     * @return OrdenCompra
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return int
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idObra
     *
     * @param integer $idObra
     *
     * @return OrdenCompra
     */
    public function setIdObra($idObra)
    {
        $this->idObra = $idObra;

        return $this;
    }

    /**
     * Get idObra
     *
     * @return int
     */
    public function getIdObra()
    {
        return $this->idObra;
    }

    /**
     * Set idProveedor
     *
     * @param integer $idProveedor
     *
     * @return OrdenCompra
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return int
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return OrdenCompra
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
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     *
     * @return OrdenCompra
     */
    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    /**
     * Get fechaEmision
     *
     * @return \DateTime
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return OrdenCompra
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }
}

