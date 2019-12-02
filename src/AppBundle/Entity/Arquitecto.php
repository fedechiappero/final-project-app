<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arquitecto
 *
 * @ORM\Table(name="arquitecto")
 * @ORM\Entity
 */
class Arquitecto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="matricula_numero", type="integer", nullable=false)
     */
    private $matriculaNumero;

    /**
     * @var \AppBundle\Entity\Personal
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Personal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}

