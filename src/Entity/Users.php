<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="USERNAME", columns={"username"}), @ORM\UniqueConstraint(name="EMAIL", columns={"email"})}, indexes={@ORM\Index(name="id_activity_area", columns={"id_activity_area"})})
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class Users implements UserInterface
{

    const ROLES = [
        "particulier" => "particulier",
        "societe"=> "société",
        "administrateur" => "administrateur",

    ];

    const ACTIVITY_AREA = [
        "Agroalimentaire" => "Agroalimentaire",
        "Banque/Assurance" => "Banque/Assurance",
        "BTP/Matériaux de construction" => "BTP/Matériaux de construction",
        "Commerce/Négoce/Distribution" => "Commerce/Négoce/Distribution",
        "Bois/Papier/Carton/Imprimerie" => "Bois/Papier/Carton/Imprimerie",
        "Chimie/Parachimie" => "Chimie/Parachimie",
        "Edition/Communication/Mutlimédia" => "Edition/Communication/Mutlimédia",
        "Electronique/ Electricité" => "Electronique/ Electricité",
        "Industrie pharmaceutique" => "Industrie pharmaceutique",
        "Etudes et conseil" => "Etudes et conseil",
        "Informatique/Télécoms" => "Informatique/Télécoms",
        "Machine et équipements/ Automobile" => "Machine et équipements/ Automobile",
        "Métallurgie/ Travail du métal" => "Métallurgie/ Travail du métal",
        "Plastique/ Caoutchouc"=> "Plastique/ Caoutchouc",
        "Services aux entreprises" => "Services aux entreprises",
        "Textile/ Habillement/ Chaussure" => "Textile/ Habillement/ Chaussure",
        "Transports/ Logistique" => "Transports/ Logistique",
    ];
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *@Assert\Length(min=14,max=14)
     * @ORM\Column(name="siret", type="string", length=20, nullable=true)
     */
    private $siret;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="postal_code", type="integer", nullable=false)
     * @Assert\Regex("/^[0-9]{5}$/")

     */
    private $postalCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     *
     * @ORM\Column(name="roles", type="array", nullable=false)
     */
    private $roles = [];

    /**
     *
     * @ORM\Column(name="activity_area", type="string", nullable=false)

     */
    private $activityArea;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRoles(): ?array
{
    $roles = $this->roles;
    $roles[] = 'ROLE_USER';
    return array_unique($roles);
}

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getActivityArea(): ?string
    {
        return $this->activityArea;
    }

    public function setActivityArea(string $activityArea): self
    {
        $this->activityArea = $activityArea;

        return $this;
    }


    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

}