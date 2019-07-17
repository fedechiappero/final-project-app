<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inmueble
 *
 * @ORM\Table(name="inmueble")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InmuebleRepository")
 */
class Inmueble
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
     * @ORM\Column(name="id_obra", type="integer")
     */
    private $idObra;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tipo", type="integer")
     */
    private $idTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


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
     * Set idObra
     *
     * @param integer $idObra
     *
     * @return Inmueble
     */
    public function setIdObra($idObra)
    {
        $this->idObra = $idObra;

        return $this;
    }

    /**
     * Get idObra
     *
     * @return int
     */
    public function getIdObra()
    {
        return $this->idObra;
    }

    /**
     * Set idTipo
     *
     * @param integer $idTipo
     *
     * @return Inmueble
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * Get idTipo
     *
     * @return int
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Inmueble
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}

