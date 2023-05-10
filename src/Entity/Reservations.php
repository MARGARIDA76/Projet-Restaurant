<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre_Couverts = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $Date = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $Heure_Prevue = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $Clients = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Visiteurs $Visiteurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreCouverts(): ?string
    {
        return $this->Nombre_Couverts;
    }

    public function setNombreCouverts(string $Nombre_Couverts): self
    {
        $this->Nombre_Couverts = $Nombre_Couverts;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->Date;
    }

    public function setDate(\DateTimeImmutable $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getHeurePrevue(): ?\DateTimeImmutable
    {
        return $this->Heure_Prevue;
    }

    public function setHeurePrevue(\DateTimeImmutable $Heure_Prevue): self
    {
        $this->Heure_Prevue = $Heure_Prevue;

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->Clients;
    }

    public function setClients(?Clients $Clients): self
    {
        $this->Clients = $Clients;

        return $this;
    }

    public function getVisiteurs(): ?Visiteurs
    {
        return $this->Visiteurs;
    }

    public function setVisiteurs(?Visiteurs $Visiteurs): self
    {
        $this->Visiteurs = $Visiteurs;

        return $this;
    }
}
