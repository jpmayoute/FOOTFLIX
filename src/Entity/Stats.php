<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatsRepository::class)]
class Stats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stats_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatsName(): ?string
    {
        return $this->stats_name;
    }

    public function setStatsName(?string $stats_name): static
    {
        $this->stats_name = $stats_name;

        return $this;
    }
}
