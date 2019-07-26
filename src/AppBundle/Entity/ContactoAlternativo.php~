<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactoAlternativo
 *
 * @ORM\Table(name="contacto_alternativo", indexes={@ORM\Index(name="id_persona", columns={"id_persona"}), @ORM\Index(name="id_contacto", columns={"id_contacto"})})
 * @ORM\Entity
 */
class ContactoAlternativo
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
     * @var \AppBundle\Entity\Persona
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Persona")
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



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idContacto
     *
     * @param \AppBundle\Entity\Persona $idContacto
     *
     * @return ContactoAlternativo
     */
    public function setIdContacto(\AppBundle\Entity\Persona $idContacto = null)
    {
        $this->idContacto = $idContacto;

        return $this;
    }

    /**
     * Get idContacto
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getIdContacto()
    {
        return $this->idContacto;
    }

    /**
     * Set idPersona
     *
     * @param \AppBundle\Entity\Persona $idPersona
     *
     * @return ContactoAlternativo
     */
    public function setIdPersona(\AppBundle\Entity\Persona $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }
}
