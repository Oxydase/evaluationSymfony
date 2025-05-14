<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceRepository::class)]
class Ressource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitule = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $presentation = null;

    #[ORM\Column(length: 50)]
    private ?string $support = null;

    #[ORM\Column(length: 50)]
    private ?string $nature = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urlDocumentPhysique = null;

    /**
     * @var Collection<int, Etape>
     */
    #[ORM\ManyToMany(targetEntity: Etape::class, inversedBy: 'ressources')]
    private Collection $presenteDans;

    /**
     * @var Collection<int, RenduActivite>
     */
    #[ORM\ManyToMany(targetEntity: RenduActivite::class, inversedBy: 'ressources')]
    private Collection $ConcernePar;

    public function __construct()
    {
        $this->presenteDans = new ArrayCollection();
        $this->ConcernePar = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): static
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): static
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getSupport(): ?string
    {
        return $this->support;
    }

    public function setSupport(string $support): static
    {
        $this->support = $support;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): static
    {
        $this->nature = $nature;

        return $this;
    }

    public function getUrlDocumentPhysique(): ?string
    {
        return $this->urlDocumentPhysique;
    }

    public function setUrlDocumentPhysique(?string $urlDocumentPhysique): static
    {
        $this->urlDocumentPhysique = $urlDocumentPhysique;

        return $this;
    }

    /**
     * @return Collection<int, Etape>
     */
    public function getPresenteDans(): Collection
    {
        return $this->presenteDans;
    }

    public function addPresenteDan(Etape $presenteDan): static
    {
        if (!$this->presenteDans->contains($presenteDan)) {
            $this->presenteDans->add($presenteDan);
        }

        return $this;
    }

    public function removePresenteDan(Etape $presenteDan): static
    {
        $this->presenteDans->removeElement($presenteDan);

        return $this;
    }

    /**
     * @return Collection<int, RenduActivite>
     */
    public function getConcernePar(): Collection
    {
        return $this->ConcernePar;
    }

    public function addConcernePar(RenduActivite $concernePar): static
    {
        if (!$this->ConcernePar->contains($concernePar)) {
            $this->ConcernePar->add($concernePar);
        }

        return $this;
    }

    public function removeConcernePar(RenduActivite $concernePar): static
    {
        $this->ConcernePar->removeElement($concernePar);

        return $this;
    }
}
