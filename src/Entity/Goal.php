<?php

namespace App\Entity;

use App\Repository\GoalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoalRepository::class)]
class Goal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $goals_number = null;

    #[ORM\ManyToOne(inversedBy: 'goals')]
    private ?Player $player = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoalsNumber(): ?int
    {
        return $this->goals_number;
    }

    public function setGoalsNumber(?int $goals_number): static
    {
        $this->goals_number = $goals_number;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }
}
