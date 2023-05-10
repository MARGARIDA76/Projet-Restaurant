<?php

namespace App\Entity;

use App\Repository\ConvivesMaximumRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConvivesMaximumRepository::class)]
class ConvivesMaximum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre_de_Convives = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreDeConvives(): ?string
    {
        return $this->Nombre_de_Convives;
    }

    public function setNombreDeConvives(string $Nombre_de_Convives): self
    {
        $this->Nombre_de_Convives = $Nombre_de_Convives;

        return $this;
    }
}
