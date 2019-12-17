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
     * Set id
     *
     * @param \AppBundle\Entity\PersonaJuridica $id
     *
     * @return Proveedor
     */
    public function setId(\AppBundle\Entity\PersonaJuridica $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\PersonaJuridica
     */
    public function getId()
    {
        return $this->id;
    }

    
}
