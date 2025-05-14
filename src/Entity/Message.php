<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column]
    private ?\DateTime $dateHeure = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?User $emet = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?User $recoit = null;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $reponse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

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

    public function getEmet(): ?User
    {
        return $this->emet;
    }

    public function setEmet(?User $emet): static
    {
        $this->emet = $emet;

        return $this;
    }

    public function getRecoit(): ?User
    {
        return $this->recoit;
    }

    public function setRecoit(?User $recoit): static
    {
        $this->recoit = $recoit;

        return $this;
    }

    public function getReponse(): ?self
    {
        return $this->reponse;
    }

    public function setReponse(?self $reponse): static
    {
        $this->reponse = $reponse;

        return $this;
    }
}
