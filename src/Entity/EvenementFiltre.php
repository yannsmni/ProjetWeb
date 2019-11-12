<?php

namespace App\Entity;

class EvenementFiltre {

    /**
     * @var int|null
     */
    private $prixMin;

    /**
     * @var int|null
     */
    private $prixMax;

    /**
     * @var string|null
     */
    private $statut;

    public function getPrixMin(): ?int
    {
        return $this->prixMin;
    }

    public function setPrixMin(int $prixMin): self
    {
        $this->prixMin = $prixMin;

        return $this;
    }

    public function getPrixMax(): ?int
    {
        return $this->prixMax;
    }

    public function setPrixMax(int $prixMax): self
    {
        $this->prixMax = $prixMax;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

}
