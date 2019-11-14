<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use phpDocumentor\Reflection\Types\Integer;
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
     * @var Categorie|null
     */
    private $category;

    /**
     * @var bool|null
     */
    private $bestSales;

    /**
     * @var bool|null
     */
    private $ascPrice;

    /**
     * @var bool|null
     */
    private $descPrice;

    public function __construct()
    {
        //$this->category = new Categorie();
    }


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

    /**
     * @return Categorie|null
     */
    public function getCategory(): ?Categorie
    {
        return $this->category;
    }

    /**
     * @param Categorie|null $category
     */
    public function setCategory(?Categorie $category): void
    {
        $this->category = $category;
    }

    /**
     * @return bool|null
     */
    public function getBestSales(): ?bool
    {
        return $this->bestSales;
    }

    /**
     * @param bool|null $bestSales
     */
    public function setBestSales(?bool $bestSales): void
    {
        $this->bestSales = $bestSales;
    }

    /**
     * @return bool|null
     */
    public function getAscPrice(): ?bool
    {
        return $this->ascPrice;
    }

    /**
     * @param bool|null $ascPrice
     */
    public function setAscPrice(?bool $ascPrice): void
    {
        $this->ascPrice = $ascPrice;
    }

    /**
     * @return bool|null
     */
    public function getDescPrice(): ?bool
    {
        return $this->descPrice;
    }

    /**
     * @param bool|null $descPrice
     */
    public function setDescPrice(?bool $descPrice): void
    {
        $this->descPrice = $descPrice;
    }


}

