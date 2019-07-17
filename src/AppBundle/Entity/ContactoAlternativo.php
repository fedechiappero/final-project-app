<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactoAlternativo
 *
 * @ORM\Table(name="contacto_alternativo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactoAlternativoRepository")
 */
class ContactoAlternativo
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
     * @ORM\Column(name="id_persona", type="integer")
     */
    private $idPersona;

    /**
     * @var int
     *
     * @ORM\Column(name="id_contacto", type="integer")
     */
    private $idContacto;


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
     * Set idPersona
     *
     * @param integer $idPersona
     *
     * @return ContactoAlternativo
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return int
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set idContacto
     *
     * @param integer $idContacto
     *
     * @return ContactoAlternativo
     */
    public function setIdContacto($idContacto)
    {
        $this->idContacto = $idContacto;

        return $this;
    }

    /**
     * Get idContacto
     *
     * @return int
     */
    public function getIdContacto()
    {
        return $this->idContacto;
    }
}

