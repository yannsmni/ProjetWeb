<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @Vich\Uploadable()
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", cascade={"persist"})
     */
    private $acheteur;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite_vendu;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="produits_images", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_edit;

    public function __construct()
    {
        $this->Date_edit = new \DateTime();
        $this->quantite_vendu = NULL;
    }

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
        $slugify = (new Slugify())->slugify($this->nom);
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
    
    public function removeAcheteur($acheteur)
    {
        return $this->acheteur->removeElement($acheteur);
    }

    /**
     * @return null|string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param null|string $filename
     * @return Produit
     */
    public function setFilename($filename): self
    {
        $this->filename = null;
        $this->filename = $filename;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;
        if($this->imageFile instanceof UploadedFile) {
            $this->Date_edit = new \DateTime();
        }

        return $this;
    }

    public function getDateEdit(): ?\DateTimeInterface
    {
        return $this->Date_edit;
    }

    public function setDateEdit(\DateTimeInterface $Date_edit): self
    {
        $this->Date_edit = $Date_edit;

        return $this;
    }

}
