<?php

namespace Championnat\sunuChampionnatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="Championnat\sunuChampionnatBundle\Repository\JoueurRepository")
 */
class Joueur
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
     * @ORM\Column(name="prenomJoueur", type="string", length=255)
     */
    private $prenomJoueur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomJoueur", type="string", length=255)
     */
    private $nomJoueur;

    /**
     * @var string
     *
     * @ORM\Column(name="dateNaissjoueur", type="string", length=255)
     */
    private $dateNaissjoueur;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutContrat", type="date")
     */
    private $dateDebutContrat;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinContrat", type="date")
     */
    private $dateFinContrat;


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
     * Set prenomJoueur
     *
     * @param string $prenomJoueur
     *
     * @return Joueur
     */
    public function setPrenomJoueur($prenomJoueur)
    {
        $this->prenomJoueur = $prenomJoueur;

        return $this;
    }

    /**
     * Get prenomJoueur
     *
     * @return string
     */
    public function getPrenomJoueur()
    {
        return $this->prenomJoueur;
    }

    /**
     * Set nomJoueur
     *
     * @param string $nomJoueur
     *
     * @return Joueur
     */
    public function setNomJoueur($nomJoueur)
    {
        $this->nomJoueur = $nomJoueur;

        return $this;
    }

    /**
     * Get nomJoueur
     *
     * @return string
     */
    public function getNomJoueur()
    {
        return $this->nomJoueur;
    }

    /**
     * Set dateNaissjoueur
     *
     * @param string $dateNaissjoueur
     *
     * @return Joueur
     */
    public function setDateNaissjoueur($dateNaissjoueur)
    {
        $this->dateNaissjoueur = $dateNaissjoueur;

        return $this;
    }

    /**
     * Get dateNaissjoueur
     *
     * @return string
     */
    public function getDateNaissjoueur()
    {
        return $this->dateNaissjoueur;
    }

    /**
     * Set dateDebutContrat
     *
     * @param \DateTime $dateDebutContrat
     *
     * @return Joueur
     */
    public function setDateDebutContrat($dateDebutContrat)
    {
        $this->dateDebutContrat = $dateDebutContrat;

        return $this;
    }

    /**
     * Get dateDebutContrat
     *
     * @return \DateTime
     */
    public function getDateDebutContrat()
    {
        return $this->dateDebutContrat;
    }

    /**
     * Set dateFinContrat
     *
     * @param \DateTime $dateFinContrat
     *
     * @return Joueur
     */
    public function setDateFinContrat($dateFinContrat)
    {
        $this->dateFinContrat = $dateFinContrat;

        return $this;
    }

    /**
     * Get dateFinContrat
     *
     * @return \DateTime
     */
    public function getDateFinContrat()
    {
        return $this->dateFinContrat;
    }
}
