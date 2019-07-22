<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caducidad
 *
 * @ORM\Table(name="caducidad")
 * @ORM\Entity
 */
class Caducidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_meses", type="integer", nullable=false)
     */
    private $cantidadMeses;

    /**
     * @var \AppBundle\Entity\Producto
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set cantidadMeses
     *
     * @param integer $cantidadMeses
     *
     * @return Caducidad
     */
    public function setCantidadMeses($cantidadMeses)
    {
        $this->cantidadMeses = $cantidadMeses;

        return $this;
    }

    /**
     * Get cantidadMeses
     *
     * @return integer
     */
    public function getCantidadMeses()
    {
        return $this->cantidadMeses;
    }

    /**
     * Set id
     *
     * @param \AppBundle\Entity\Producto $id
     *
     * @return Caducidad
     */
    public function setId(\AppBundle\Entity\Producto $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\Producto
     */
    public function getId()
    {
        return $this->id;
    }
}
