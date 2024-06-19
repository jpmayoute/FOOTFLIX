<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Player>
     */
    #[ORM\ManyToMany(targetEntity: Player::class, mappedBy: 'stats')]
    private Collection $players;

    /**
     * @var Collection<int, Number>
     */
    #[ORM\ManyToMany(targetEntity: Number::class, inversedBy: 'stats')]
    private Collection $number;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->number = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): static
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);
            $player->addStat($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        if ($this->players->removeElement($player)) {
            $player->removeStat($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Number>
     */
    public function getNumber(): Collection
    {
        return $this->number;
    }

    public function addNumber(Number $number): static
    {
        if (!$this->number->contains($number)) {
            $this->number->add($number);
        }

        return $this;
    }

    public function removeNumber(Number $number): static
    {
        $this->number->removeElement($number);

        return $this;
    }
}
