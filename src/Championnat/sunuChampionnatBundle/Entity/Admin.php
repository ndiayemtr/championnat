<?php

namespace Championnat\sunuChampionnatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="Championnat\sunuChampionnatBundle\Repository\AdminRepository")
 */
class Admin
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
     * @var string
     *
     * @ORM\Column(name="nomAdmin", type="string", length=255)
     */
    private $nomAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomAdmin", type="string", length=255)
     */
    private $prenomAdmin;
   

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
     * Set nomAdmin
     *
     * @param string $nomAdmin
     *
     * @return Admin
     */
    public function setNomAdmin($nomAdmin)
    {
        $this->nomAdmin = $nomAdmin;

        return $this;
    }

    /**
     * Get nomAdmin
     *
     * @return string
     */
    public function getNomAdmin()
    {
        return $this->nomAdmin;
    }

    /**
     * Set prenomAdmin
     *
     * @param string $prenomAdmin
     *
     * @return Admin
     */
    public function setPrenomAdmin($prenomAdmin)
    {
        $this->prenomAdmin = $prenomAdmin;

        return $this;
    }

    /**
     * Get prenomAdmin
     *
     * @return string
     */
    public function getPrenomAdmin()
    {
        return $this->prenomAdmin;
    }
}
