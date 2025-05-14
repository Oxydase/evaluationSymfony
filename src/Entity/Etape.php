<?php

namespace App\Entity;

use App\Repository\EtapeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapeRepository::class)]
class Etape
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptif = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $consignes = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\ManyToOne(inversedBy: 'etapes')]
    private ?Parcours $parcours = null;

    /**
     * @var Collection<int, RenduActivite>
     */
    #[ORM\ManyToMany(targetEntity: RenduActivite::class, mappedBy: 'validePar')]
    private Collection $renduActivites;

    /**
     * @var Collection<int, Ressource>
     */
    #[ORM\ManyToMany(targetEntity: Ressource::class, mappedBy: 'presenteDans')]
    private Collection $ressources;

    /**
     * @var Collection<int, RenduActivite>
     */
    #[ORM\ManyToMany(targetEntity: RenduActivite::class, inversedBy: 'etapes')]
    private Collection $renduValides;

    public function __construct()
    {
        $this->renduActivites = new ArrayCollection();
        $this->ressources = new ArrayCollection();
        $this->renduValides = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): static
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getConsignes(): ?string
    {
        return $this->consignes;
    }

    public function setConsignes(string $consignes): static
    {
        $this->consignes = $consignes;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getParcours(): ?Parcours
    {
        return $this->parcours;
    }

    public function setParcours(?Parcours $parcours): static
    {
        $this->parcours = $parcours;

        return $this;
    }

    /**
     * @return Collection<int, RenduActivite>
     */
    public function getRenduActivites(): Collection
    {
        return $this->renduActivites;
    }

    public function addRenduActivite(RenduActivite $renduActivite): static
    {
        if (!$this->renduActivites->contains($renduActivite)) {
            $this->renduActivites->add($renduActivite);
            $renduActivite->addValidePar($this);
        }

        return $this;
    }

    public function removeRenduActivite(RenduActivite $renduActivite): static
    {
        if ($this->renduActivites->removeElement($renduActivite)) {
            $renduActivite->removeValidePar($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Ressource>
     */
    public function getRessources(): Collection
    {
        return $this->ressources;
    }

    public function addRessource(Ressource $ressource): static
    {
        if (!$this->ressources->contains($ressource)) {
            $this->ressources->add($ressource);
            $ressource->addPresenteDan($this);
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): static
    {
        if ($this->ressources->removeElement($ressource)) {
            $ressource->removePresenteDan($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, RenduActivite>
     */
    public function getRenduValides(): Collection
    {
        return $this->renduValides;
    }

    public function addRenduValide(RenduActivite $renduValide): static
    {
        if (!$this->renduValides->contains($renduValide)) {
            $this->renduValides->add($renduValide);
        }

        return $this;
    }

    public function removeRenduValide(RenduActivite $renduValide): static
    {
        $this->renduValides->removeElement($renduValide);

        return $this;
    }
}
