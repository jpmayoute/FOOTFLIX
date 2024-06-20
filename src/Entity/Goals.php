<?php

namespace App\Entity;

use App\Repository\GoalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoalsRepository::class)]
class Goals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $goals_number = null;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\ManyToMany(targetEntity: Player::class, mappedBy: 'goals')]
    private Collection $players;

    public function __construct()
    {
        $this->players = new ArrayCollection();
    }

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
            $player->addGoal($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        if ($this->players->removeElement($player)) {
            $player->removeGoal($this);
        }

        return $this;
    }
}
