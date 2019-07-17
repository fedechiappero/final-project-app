<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caducidad
 *
 * @ORM\Table(name="caducidad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CaducidadRepository")
 */
class Caducidad
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
     * @ORM\Column(name="cantidad_meses", type="integer")
     */
    private $cantidadMeses;


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
     * @return int
     */
    public function getCantidadMeses()
    {
        return $this->cantidadMeses;
    }
}

