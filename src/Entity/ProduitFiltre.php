<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ProduitFiltre {

    /**
     * @var int|null
     * @Assert\Range(min=1, max=200)
     */
    private $maxPrice;
    /**
     * @var int|null
     * @Assert\Range(min=1, max=200)
     */
    private $minPrice;

    /**
     * @return int|null
     */
    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    /**
     * @param int|null $minPrice
     */
    public function setMinPrice(?int $minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     */
    public function setMaxPrice(?int $maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }
}

