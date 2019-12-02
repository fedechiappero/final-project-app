<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratista
 *
 * @ORM\Table(name="contratista", indexes={@ORM\Index(name="id_usuario", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Contratista
{
    /**
     * @var \AppBundle\Entity\PersonaJuridica
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\PersonaJuridica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;


}

