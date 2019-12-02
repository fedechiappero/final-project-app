<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto", indexes={@ORM\Index(name="id_presupuesto", columns={"id_presupuesto"})})
 * @ORM\Entity
 */
class Proyecto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="legajo_municipal_nro", type="integer", nullable=false)
     */
    private $legajoMunicipalNro;

    /**
     * @var integer
     *
     * @ORM\Column(name="colegio_arquitecto_nro", type="integer", nullable=false)
     */
    private $colegioArquitectoNro;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Presupuesto
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Presupuesto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_presupuesto", referencedColumnName="id")
     * })
     */
    private $idPresupuesto;



    /**
     * Set legajoMunicipalNro
     *
     * @param integer $legajoMunicipalNro
     *
     * @return Proyecto
     */
    public function setLegajoMunicipalNro($legajoMunicipalNro)
    {
        $this->legajoMunicipalNro = $legajoMunicipalNro;

        return $this;
    }

    /**
     * Get legajoMunicipalNro
     *
     * @return integer
     */
    public function getLegajoMunicipalNro()
    {
        return $this->legajoMunicipalNro;
    }

    /**
     * Set colegioArquitectoNro
     *
     * @param integer $colegioArquitectoNro
     *
     * @return Proyecto
     */
    public function setColegioArquitectoNro($colegioArquitectoNro)
    {
        $this->colegioArquitectoNro = $colegioArquitectoNro;

        return $this;
    }

    /**
     * Get colegioArquitectoNro
     *
     * @return integer
     */
    public function getColegioArquitectoNro()
    {
        return $this->colegioArquitectoNro;
    }

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
     * Set idPresupuesto
     *
     * @param \AppBundle\Entity\Presupuesto $idPresupuesto
     *
     * @return Proyecto
     */
    public function setIdPresupuesto(\AppBundle\Entity\Presupuesto $idPresupuesto = null)
    {
        $this->idPresupuesto = $idPresupuesto;

        return $this;
    }

    /**
     * Get idPresupuesto
     *
     * @return \AppBundle\Entity\Presupuesto
     */
    public function getIdPresupuesto()
    {
        return $this->idPresupuesto;
    }
}
