<?php

namespace App\Entity;

use App\Repository\RenduActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RenduActiviteRepository::class)]
class RenduActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $urlDocument = null;

    #[ORM\Column]
    private ?\DateTime $dateHeure = null;

    #[ORM\ManyToOne(inversedBy: 'renduActivites')]
    private ?User $deposePar = null;

    /**
     * @var Collection<int, Etape>
     */
    #[ORM\ManyToMany(targetEntity: Etape::class, inversedBy: 'renduActivites')]
    private Collection $validePar;

    /**
     * @var Collection<int, Ressource>
     */
    #[ORM\ManyToMany(targetEntity: Ressource::class, mappedBy: 'ConcernePar')]
    private Collection $ressources;

    /**
     * @var Collection<int, Etape>
     */
    #[ORM\ManyToMany(targetEntity: Etape::class, mappedBy: 'renduValides')]
    private Collection $etapes;

    public function __construct()
    {
        $this->validePar = new ArrayCollection();
        $this->ressources = new ArrayCollection();
        $this->etapes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlDocument(): ?string
    {
        return $this->urlDocument;
    }

    public function setUrlDocument(string $urlDocument): static
    {
        $this->urlDocument = $urlDocument;

        return $this;
    }

    public function getDateHeure(): ?\DateTime
    {
        return $this->dateHeure;
    }

    public function setDateHeure(\DateTime $dateHeure): static
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    public function getDeposePar(): ?User
    {
        return $this->deposePar;
    }

    public function setDeposePar(?User $deposePar): static
    {
        $this->deposePar = $deposePar;

        return $this;
    }

    /**
     * @return Collection<int, Etape>
     */
    public function getValidePar(): Collection
    {
        return $this->validePar;
    }

    public function addValidePar(Etape $validePar): static
    {
        if (!$this->validePar->contains($validePar)) {
            $this->validePar->add($validePar);
        }

        return $this;
    }

    public function removeValidePar(Etape $validePar): static
    {
        $this->validePar->removeElement($validePar);

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
            $ressource->addConcernePar($this);
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): static
    {
        if ($this->ressources->removeElement($ressource)) {
            $ressource->removeConcernePar($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Etape>
     */
    public function getEtapes(): Collection
    {
        return $this->etapes;
    }

    public function addEtape(Etape $etape): static
    {
        if (!$this->etapes->contains($etape)) {
            $this->etapes->add($etape);
            $etape->addRenduValide($this);
        }

        return $this;
    }

    public function removeEtape(Etape $etape): static
    {
        if ($this->etapes->removeElement($etape)) {
            $etape->removeRenduValide($this);
        }

        return $this;
    }
}
