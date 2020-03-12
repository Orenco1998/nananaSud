<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


class DiySearch
{

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $link;

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
     * @return DiySearch
     */
    public function setTitle(string $title): DiySearch
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     * @return DiySearch
     */
    public function setLink(string $link): DiySearch
    {
        $this->link = $link;
        return $this;
    }

}