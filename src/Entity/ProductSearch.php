<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


class ProductSearch
{

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var string|null
     */
    private $name;



    public function __construct()
    {

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
     * @return ProductSearch
     */
    public function setMaxPrice(int $maxPrice): ProductSearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ProductSearch
     */
    public function setName(string $name): ProductSearch
    {
        $this->name = $name;
        return $this;
    }

}