<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


class ServiceSearch
{

    /**
     * @var string|null
     */
    private $title;



    public function __construct()
    {

    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return ServiceSearch
     */
    public function setTitle(string $title): ServiceSearch
    {
        $this->title = $title;
        return $this;
    }

}