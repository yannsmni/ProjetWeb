<?php

namespace App\Entity;

use App\Entity\Commentaire;
use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
* @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
* @Vich\Uploadable()
*/
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @var string|null
    * @ORM\Column(type="string", length=255)
    */
    private $filename;

    /**
    * @var File|null
    * @Vich\UploadableField(mapping="photos_images", fileNameProperty="filename")
    */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evenement", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Evenement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Visible;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="UploadImage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="Image")
     */
    private $commentaire;

    /**
    * @ORM\Column(type="datetime")
    */
    private $Date_edit;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur")
     */
    private $Vote;

    public function __construct() {
        $this->Date_edit = new \DateTime();
        $this->Visible = true;
        $this->commentaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Image
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->Evenement;
    }

    public function setEvenement(?Evenement $Evenement): self
    {
        $this->Evenement = $Evenement;

        return $this;
    }

    public function getVisible(): ?bool
    {
        return $this->Visible;
    }

    public function setVisible(bool $Visible): self
    {
        $this->Visible = $Visible;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setImage($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaire->contains($commentaire)) {
            $this->commentaire->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getImage() === $this) {
                $commentaire->setImage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getVote(): Collection
    {
        return $this->Vote;
    }
}
