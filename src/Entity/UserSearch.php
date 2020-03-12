<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


class UserSearch
{

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $roles;



    public function __construct()
    {

    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return UserSearch
     */
    public function setTitle(string $email): UserSearch
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRoles(): ?string
    {
        return $this->roles;
    }

    /**
     * @param string|null $roles
     * @return UserSearch
     */
    public function setRoles(string $roles): UserSearch
    {
        $this->roles = $roles;
        return $this;
    }

}