<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacto
 *
 * @ORM\Table(name="contacto", indexes={@ORM\Index(name="id_persona", columns={"id_persona"}), @ORM\Index(name="id_contacto", columns={"id_contacto"})})
 * @ORM\Entity
 */
class Contacto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\PersonaFisica
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PersonaFisica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contacto", referencedColumnName="id")
     * })
     */
    private $idContacto;

    /**
     * @var \AppBundle\Entity\Persona
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;


}
