<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Precio
 *
 * @ORM\Table(name="precio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrecioRepository")
 */
class Precio
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
     * @ORM\Column(name="id_proveedor", type="integer")
     */
    private $idProveedor;

    /**
     * @var int
     *
     * @ORM\Column(name="id_producto", type="integer")
     */
    private $idProducto;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultima_actualizacion", type="datetime")
     */
    private $fechaUltimaActualizacion;


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
     * Set idProveedor
     *
     * @param integer $idProveedor
     *
     * @return Precio
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
     * Set idProducto
     *
     * @param integer $idProducto
     *
     * @return Precio
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return int
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set fechaUltimaActualizacion
     *
     * @param \DateTime $fechaUltimaActualizacion
     *
     * @return Precio
     */
    public function setFechaUltimaActualizacion($fechaUltimaActualizacion)
    {
        $this->fechaUltimaActualizacion = $fechaUltimaActualizacion;

        return $this;
    }

    /**
     * Get fechaUltimaActualizacion
     *
     * @return \DateTime
     */
    public function getFechaUltimaActualizacion()
    {
        return $this->fechaUltimaActualizacion;
    }
}

