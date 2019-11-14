<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class EvenementSearch {

    /**
     * @var string|null
     */
    private $recherche;

    /**
     * @return string|null
     */
    public function getRecherche(): ?string
    {
        return $this->recherche;
    }

    /**
     * @param string|null $search
     */
    public function setRecherche(?string $recherche): void
    {
        $this->recherche = $recherche;
    }
}

