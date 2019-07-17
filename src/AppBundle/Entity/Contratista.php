<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratista
 *
 * @ORM\Table(name="contratista")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContratistaRepository")
 */
class Contratista
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="razon_social", type="string", length=255)
     */
    private $razonSocial;


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
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Contratista
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
     * @param integer $id
     *
     * @return Contratista
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
