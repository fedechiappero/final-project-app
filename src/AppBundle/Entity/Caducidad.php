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


}

