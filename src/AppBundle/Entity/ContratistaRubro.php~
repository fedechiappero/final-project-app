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


}

