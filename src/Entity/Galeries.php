<?php

namespace App\Entity;

use App\Repository\GaleriesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GaleriesRepository::class)]
class Galeries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Titre = null;

    #[ORM\ManyToOne(inversedBy: 'galeries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Administrateurs $Administrateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getAdministrateurs(): ?Administrateurs
    {
        return $this->Administrateurs;
    }

    public function setAdministrateurs(?Administrateurs $Administrateurs): self
    {
        $this->Administrateurs = $Administrateurs;

        return $this;
    }
}
