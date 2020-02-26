<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParagrapheEntreprise
 *
 * @ORM\Table(name="paragraphe_entreprise")
 * @ORM\Entity(repositoryClass="App\Repository\ParagrapheEntrepriseRepository")
 */
class ParagrapheEntreprise
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
     * @var string
     *
     * @ORM\Column(name="page", type="string", length=40, nullable=false)
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="section", type="string", length=40, nullable=false)
     */
    private $section;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text", length=65535, nullable=false)
     */
    private $texte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPage(): ?string
    {
        return $this->page;
    }

    public function setPage(string $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }


}
