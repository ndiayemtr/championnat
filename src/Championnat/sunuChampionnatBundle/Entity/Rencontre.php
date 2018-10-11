<?php

namespace Championnat\sunuChampionnatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Rencontre
 *
 * @ORM\Table(name="rencontre")
 * @ORM\Entity(repositoryClass="Championnat\sunuChampionnatBundle\Repository\RencontreRepository")
 */
class Rencontre
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateMatch", type="date")
     */
    private $dateMatch;
    
    /**
     * @var int
     *
     * @ORM\Column(name="journee", type="integer")
     */
    private $journee;
    
     /**
     * @var int
     *
     * @ORM\Column(name="butDomicile", type="integer")
     */
    private $butDomicile;
    
    /**
     * @var int
     *
     * @ORM\Column(name="butExterieur", type="integer")
     */
    private $butExterieur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDebut", type="time")
     */
    private $heureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureFin", type="time")
     */
    private $heureFin;
    
    /**
     * @ORM\ManyToMany(targetEntity="Championnat\sunuChampionnatBundle\Entity\Equipe", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipes;
    
    public function __construct() {
        $this->equipes = new ArrayCollection();
    }

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
     * Set dateMatch
     *
     * @param \DateTime $dateMatch
     *
     * @return Rencontre
     */
    public function setDateMatch($dateMatch)
    {
        $this->dateMatch = $dateMatch;

        return $this;
    }

    /**
     * Get dateMatch
     *
     * @return \DateTime
     */
    public function getDateMatch()
    {
        return $this->dateMatch;
    }

    /**
     * Set heureDebut
     *
     * @param \DateTime $heureDebut
     *
     * @return Rencontre
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut
     *
     * @return \DateTime
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set heureFin
     *
     * @param \DateTime $heureFin
     *
     * @return Rencontre
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return \DateTime
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }
    
    


    /**
     * Add equipe
     *
     * @param \Championnat\sunuChampionnatBundle\Entity\Equipe $equipe
     *
     * @return Rencontre
     */
    public function addEquipe(\Championnat\sunuChampionnatBundle\Entity\Equipe $equipe)
    {
        $this->equipes[] = $equipe;

        return $this;
    }

    /**
     * Remove equipe
     *
     * @param \Championnat\sunuChampionnatBundle\Entity\Equipe $equipe
     */
    public function removeEquipe(\Championnat\sunuChampionnatBundle\Entity\Equipe $equipe)
    {
        $this->equipes->removeElement($equipe);
    }

    /**
     * Get equipes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipes()
    {
        return $this->equipes;
    }

    /**
     * Set journee
     *
     * @param integer $journee
     *
     * @return Rencontre
     */
    public function setJournee($journee)
    {
        $this->journee = $journee;

        return $this;
    }

    /**
     * Get journee
     *
     * @return integer
     */
    public function getJournee()
    {
        return $this->journee;
    }

    

    /**
     * Set butDomicile
     *
     * @param integer $butDomicile
     *
     * @return Rencontre
     */
    public function setButDomicile($butDomicile)
    {
        $this->butDomicile = $butDomicile;

        return $this;
    }

    /**
     * Get butDomicile
     *
     * @return integer
     */
    public function getButDomicile()
    {
        return $this->butDomicile;
    }

    /**
     * Set butExterieur
     *
     * @param integer $butExterieur
     *
     * @return Rencontre
     */
    public function setButExterieur($butExterieur)
    {
        $this->butExterieur = $butExterieur;

        return $this;
    }

    /**
     * Get butExterieur
     *
     * @return integer
     */
    public function getButExterieur()
    {
        return $this->butExterieur;
    }
}
