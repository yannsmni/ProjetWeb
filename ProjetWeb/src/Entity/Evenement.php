<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 */
class Evenement
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", cascade={"persist"})
     */
    private $Participants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="Evenement")
     */
    private $Commentaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="Evenement")
     */
    private $Images;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_creation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Gratuite;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Statut;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->participants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * @return Collection|Participants[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(Participant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->setEvenement($this);
        }

        return $this;
    }

    public function removeParticipant(Participant $participant): self
    {
        if ($this->participants->contains($participant)) {
            $this->participants->removeElement($participant);
            // set the owning side to null (unless already changed)
            if ($participant->getEvenement() === $this) {
                $participant->setEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setEvenement($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getEvenement() === $this) {
                $commentaire->setEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setEvenement($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getEvenement() === $this) {
                $image->setEvenement(null);
            }
        }

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_creation): self
    {
        $this->Date_creation = $Date_creation;

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
}
