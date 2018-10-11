<?php

namespace Championnat\sunuChampionnatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="Championnat\sunuChampionnatBundle\Repository\EquipeRepository")
 */
class Equipe
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
     * @ORM\Column(name="nomEquipe", type="string", length=100)
     */
    private $nomEquipe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreationEquipe", type="date")
     */
    private $dateCreationEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseEquipe", type="string", length=255)
     */
    private $adresseEquipe;
    
    /**
     * @var int
     *
     * @ORM\Column(name="nbJourneesJouee", type="integer")
     */
    private $nbJourneesJouee;
    
    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
      public function __toString() {
        return $this->getNomEquipe();
    }

    /**
     * Set nomEquipe
     *
     * @param string $nomEquipe
     *
     * @return Equipe
     */
    public function setNomEquipe($nomEquipe)
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    /**
     * Get nomEquipe
     *
     * @return string
     */
    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    /**
     * Set dateCreationEquipe
     *
     * @param \DateTime $dateCreationEquipe
     *
     * @return Equipe
     */
    public function setDateCreationEquipe($dateCreationEquipe)
    {
        $this->dateCreationEquipe = $dateCreationEquipe;

        return $this;
    }

    /**
     * Get dateCreationEquipe
     *
     * @return \DateTime
     */
    public function getDateCreationEquipe()
    {
        return $this->dateCreationEquipe;
    }

    /**
     * Set adresseEquipe
     *
     * @param string $adresseEquipe
     *
     * @return Equipe
     */
    public function setAdresseEquipe($adresseEquipe)
    {
        $this->adresseEquipe = $adresseEquipe;

        return $this;
    }

    /**
     * Get adresseEquipe
     *
     * @return string
     */
    public function getAdresseEquipe()
    {
        return $this->adresseEquipe;
    }


    /**
     * Set rencontre
     *
     * @param \Championnat\sunuChampionnatBundle\Entity\Rencontre $rencontre
     *
     * @return Equipe
     */
    public function setRencontre(\Championnat\sunuChampionnatBundle\Entity\Rencontre $rencontre = null)
    {
        $this->rencontre = $rencontre;

        return $this;
    }

    /**
     * Get rencontre
     *
     * @return \Championnat\sunuChampionnatBundle\Entity\Rencontre
     */
    public function getRencontre()
    {
        return $this->rencontre;
    }


    /**
     * Set points
     *
     * @param integer $points
     *
     * @return Equipe
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set nbJourneesJouee
     *
     * @param integer $nbJourneesJouee
     *
     * @return Equipe
     */
    public function setNbJourneesJouee($nbJourneesJouee)
    {
        $this->nbJourneesJouee = $nbJourneesJouee;

        return $this;
    }

    /**
     * Get nbJourneesJouee
     *
     * @return integer
     */
    public function getNbJourneesJouee()
    {
        return $this->nbJourneesJouee;
    }
}
