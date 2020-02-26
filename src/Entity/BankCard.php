<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BankCard
 *
 * @ORM\Table(name="bank_card", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\BankCardRepository")
 */
class BankCard
{
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
     * @ORM\Column(name="card_number", type="string", length=20, nullable=true)
     */
    private $cardNumber;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="expiration_date", type="date", nullable=true)
     */
    private $expirationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cryptogram", type="string", length=3, nullable=true)
     */
    private $cryptogram;

    /**
     * @var \UsersParticular
     *
     * @ORM\ManyToOne(targetEntity="UsersParticular")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(?string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?\DateTimeInterface $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getCryptogram(): ?string
    {
        return $this->cryptogram;
    }

    public function setCryptogram(?string $cryptogram): self
    {
        $this->cryptogram = $cryptogram;

        return $this;
    }

    public function getIdUser(): ?UsersParticular
    {
        return $this->idUser;
    }

    public function setIdUser(?UsersParticular $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
