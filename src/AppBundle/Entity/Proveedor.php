<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proveedor
 *
 * @ORM\Table(name="proveedor")
 * @ORM\Entity
 */
class Proveedor
{
    /**
     * @var string
     *
     * @ORM\Column(name="razon_social", type="string", length=255, nullable=false)
     */
    private $razonSocial;

    /**
     * @var \AppBundle\Entity\Persona
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Proveedor
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set id
     *
     * @param \AppBundle\Entity\Persona $id
     *
     * @return Proveedor
     */
    public function setId(\AppBundle\Entity\Persona $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getId()
    {
        return $this->id;
    }
}
