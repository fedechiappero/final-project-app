<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratistaRubro
 *
 * @ORM\Table(name="contratista_rubro")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContratistaRubroRepository")
 */
class ContratistaRubro
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
     * @ORM\Column(name="id_contratista", type="integer")
     */
    private $idContratista;

    /**
     * @var int
     *
     * @ORM\Column(name="id_rubro", type="integer")
     */
    private $idRubro;


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
     * Set idContratista
     *
     * @param integer $idContratista
     *
     * @return ContratistaRubro
     */
    public function setIdContratista($idContratista)
    {
        $this->idContratista = $idContratista;

        return $this;
    }

    /**
     * Get idContratista
     *
     * @return int
     */
    public function getIdContratista()
    {
        return $this->idContratista;
    }

    /**
     * Set idRubro
     *
     * @param integer $idRubro
     *
     * @return ContratistaRubro
     */
    public function setIdRubro($idRubro)
    {
        $this->idRubro = $idRubro;

        return $this;
    }

    /**
     * Get idRubro
     *
     * @return int
     */
    public function getIdRubro()
    {
        return $this->idRubro;
    }
}

