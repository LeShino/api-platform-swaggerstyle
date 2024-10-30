<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Symfony\Component\Uid\Ulid;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TeamRepository;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Bridge\Doctrine\Types\UlidType;
use Symfony\Component\Serializer\Attribute\Groups;


#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ApiResource]
class Team
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;
    #[ORM\Id]
    #[ORM\Column(type: UlidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.ulid_generator')]
    #[Groups(['team:create','team:read', 'team:read:one','team:update'])]
    private ?Ulid $id;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $ecusson = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $logos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEcusson(): ?string
    {
        return $this->ecusson;
    }

    public function setEcusson(string $ecusson): static
    {
        $this->ecusson = $ecusson;

        return $this;
    }

    public function getLogos(): ?array
    {
        return $this->logos;
    }

    public function setLogos(?array $logos): static
    {
        $this->logos = $logos;

        return $this;
    }
}
