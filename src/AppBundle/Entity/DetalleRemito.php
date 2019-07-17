<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleRemito
 *
 * @ORM\Table(name="detalle_remito")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetalleRemitoRepository")
 */
class DetalleRemito
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
     * @ORM\Column(name="id_producto", type="integer")
     */
    private $idProducto;

    /**
     * @var int
     *
     * @ORM\Column(name="id_remito", type="integer")
     */
    private $idRemito;


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
     * Set idProducto
     *
     * @param integer $idProducto
     *
     * @return DetalleRemito
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
     * Set idRemito
     *
     * @param integer $idRemito
     *
     * @return DetalleRemito
     */
    public function setIdRemito($idRemito)
    {
        $this->idRemito = $idRemito;

        return $this;
    }

    /**
     * Get idRemito
     *
     * @return int
     */
    public function getIdRemito()
    {
        return $this->idRemito;
    }
}

