<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Image")
     */
    private $Vote;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="utilisateur")
     */
    private $UploadImage;

    public function __construct()
    {
        $this->Vote = new ArrayCollection();
        $this->UploadImage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getVote(): Collection
    {
        return $this->Vote;
    }

    public function addVote(Evenement $vote): self
    {
        if (!$this->Vote->contains($vote)) {
            $this->Vote[] = $vote;
        }

        return $this;
    }

    public function removeVote(Evenement $vote): self
    {
        if ($this->Vote->contains($vote)) {
            $this->Vote->removeElement($vote);
        }

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getUploadImage(): Collection
    {
        return $this->UploadImage;
    }

    public function addUploadImage(Image $uploadImage): self
    {
        if (!$this->UploadImage->contains($uploadImage)) {
            $this->UploadImage[] = $uploadImage;
            $uploadImage->setUtilisateur($this);
        }

        return $this;
    }

    public function removeUploadImage(Image $uploadImage): self
    {
        if ($this->UploadImage->contains($uploadImage)) {
            $this->UploadImage->removeElement($uploadImage);
            // set the owning side to null (unless already changed)
            if ($uploadImage->getUtilisateur() === $this) {
                $uploadImage->setUtilisateur(null);
            }
        }

        return $this;
    }
}
