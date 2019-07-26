<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratistaRubro
 *
 * @ORM\Table(name="contratista_rubro", indexes={@ORM\Index(name="contratista_rubro_ibfk_1", columns={"id_contratista"}), @ORM\Index(name="id_rubro", columns={"id_rubro"})})
 * @ORM\Entity
 */
class ContratistaRubro
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
     * @var \AppBundle\Entity\Rubro
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rubro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rubro", referencedColumnName="id")
     * })
     */
    private $idRubro;

    /**
     * @var \AppBundle\Entity\Contratista
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Contratista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contratista", referencedColumnName="id")
     * })
     */
    private $idContratista;



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
     * Set idRubro
     *
     * @param \AppBundle\Entity\Rubro $idRubro
     *
     * @return ContratistaRubro
     */
    public function setIdRubro(\AppBundle\Entity\Rubro $idRubro = null)
    {
        $this->idRubro = $idRubro;

        return $this;
    }

    /**
     * Get idRubro
     *
     * @return \AppBundle\Entity\Rubro
     */
    public function getIdRubro()
    {
        return $this->idRubro;
    }

    /**
     * Set idContratista
     *
     * @param \AppBundle\Entity\Contratista $idContratista
     *
     * @return ContratistaRubro
     */
    public function setIdContratista(\AppBundle\Entity\Contratista $idContratista = null)
    {
        $this->idContratista = $idContratista;

        return $this;
    }

    /**
     * Get idContratista
     *
     * @return \AppBundle\Entity\Contratista
     */
    public function getIdContratista()
    {
        return $this->idContratista;
    }
}
