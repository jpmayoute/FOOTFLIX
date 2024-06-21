<?php

namespace App\Entity;

use App\Repository\DecisifPassRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DecisifPassRepository::class)]
class DecisifPass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $decisif_pass_number = null;

    #[ORM\ManyToOne(inversedBy: 'decisifPasses')]
    private ?Player $player = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDecisifPassNumber(): ?int
    {
        return $this->decisif_pass_number;
    }

    public function setDecisifPassNumber(int $decisif_pass_number): static
    {
        $this->decisif_pass_number = $decisif_pass_number;

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
