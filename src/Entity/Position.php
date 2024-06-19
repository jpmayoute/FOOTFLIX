<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionRepository::class)]
class Position
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $position_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPositionName(): ?string
    {
        return $this->position_name;
    }

    public function setPositionName(string $position_name): static
    {
        $this->position_name = $position_name;

        return $this;
    }
}
