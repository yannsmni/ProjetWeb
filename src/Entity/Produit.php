<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Categorie;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Image_chemin;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", cascade={"persist"})
     */
    private $acheteur;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite_vendu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSlug(): string {
        $slugify = (new Slugify())->slugify($this->Nom);
        return $slugify;

    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getImageChemin(): ?string
    {
        return $this->Image_chemin;
    }

    public function setImageChemin(string $Image_chemin): self
    {
        $this->Image_chemin = $Image_chemin;

        return $this;
    }

    public function getQuantiteVendu(): ?int
    {
        return $this->quantite_vendu;
    }

    public function setQuantiteVendu(int $quantite_vendu): self
    {
        $this->quantite_vendu = $quantite_vendu;

        return $this;
    }

    public function getAcheteur() : ?Utilisateur
    {
		return $this->acheteur;
	}

	public function setAcheteur(?Utilisateur $acheteur) {
        $this->acheteur = $acheteur;
        
        return $this;
	}

}
