<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Jours = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $Heures = null;

    #[ORM\ManyToOne(inversedBy: 'Horaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Administrateurs $administrateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJours(): ?string
    {
        return $this->Jours;
    }

    public function setJours(string $Jours): self
    {
        $this->Jours = $Jours;

        return $this;
    }

    public function getHeures(): ?\DateTimeImmutable
    {
        return $this->Heures;
    }

    public function setHeures(\DateTimeImmutable $Heures): self
    {
        $this->Heures = $Heures;

        return $this;
    }

    public function getAdministrateurs(): ?Administrateurs
    {
        return $this->administrateurs;
    }

    public function setAdministrateurs(?Administrateurs $administrateurs): self
    {
        $this->administrateurs = $administrateurs;

        return $this;
    }
}
