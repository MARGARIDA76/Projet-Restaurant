<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteRepository::class)]
class Compte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Mot_de_Passe = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre_Convives_par_defaut = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Allergies = null;

    #[ORM\OneToOne(mappedBy: 'Compte', cascade: ['persist', 'remove'])]
    private ?Visiteurs $visiteurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->Mot_de_Passe;
    }

    public function setMotDePasse(string $Mot_de_Passe): self
    {
        $this->Mot_de_Passe = $Mot_de_Passe;

        return $this;
    }

    public function getNombreConvivesParDefaut(): ?string
    {
        return $this->Nombre_Convives_par_defaut;
    }

    public function setNombreConvivesParDefaut(string $Nombre_Convives_par_defaut): self
    {
        $this->Nombre_Convives_par_defaut = $Nombre_Convives_par_defaut;

        return $this;
    }

    public function getAllergies(): ?string
    {
        return $this->Allergies;
    }

    public function setAllergies(string $Allergies): self
    {
        $this->Allergies = $Allergies;

        return $this;
    }

    public function getVisiteurs(): ?Visiteurs
    {
        return $this->visiteurs;
    }

    public function setVisiteurs(Visiteurs $visiteurs): self
    {
        // set the owning side of the relation if necessary
        if ($visiteurs->getCompte() !== $this) {
            $visiteurs->setCompte($this);
        }

        $this->visiteurs = $visiteurs;

        return $this;
    }
}
