<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompagnyBasket
 *
 * @ORM\Table(name="compagny_basket", indexes={@ORM\Index(name="FK_id_compagny", columns={"id_compagny"}), @ORM\Index(name="FK_id_service", columns={"id_service"})})
 * @ORM\Entity(repositoryClass="App\Repository\CompagnyBasketRepository")
 */
class CompagnyBasket
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
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_service", referencedColumnName="id")
     * })
     */
    private $idService;

    /**
     * @var \UsersCompagnies
     *
     * @ORM\ManyToOne(targetEntity="UsersCompagnies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_compagny", referencedColumnName="id")
     * })
     */
    private $idCompagny;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdService(): ?Service
    {
        return $this->idService;
    }

    public function setIdService(?Service $idService): self
    {
        $this->idService = $idService;

        return $this;
    }

    public function getIdCompagny(): ?UsersCompagnies
    {
        return $this->idCompagny;
    }

    public function setIdCompagny(?UsersCompagnies $idCompagny): self
    {
        $this->idCompagny = $idCompagny;

        return $this;
    }


}
