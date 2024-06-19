<?php

namespace App\Entity;

use App\Repository\PalmaresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PalmaresRepository::class)]
class Palmares
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(nullable: true)]
    private ?int $palmares_year = null;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\ManyToMany(targetEntity: Player::class, mappedBy: 'palmares')]
    private Collection $players;

    /**
     * @var Collection<int, Number>
     */
    #[ORM\ManyToMany(targetEntity: Number::class, inversedBy: 'palmares')]
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPalmaresYear(): ?int
    {
        return $this->palmares_year;
    }

    public function setPalmaresYear(?int $palmares_year): static
    {
        $this->palmares_year = $palmares_year;

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
            $player->addPalmare($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        if ($this->players->removeElement($player)) {
            $player->removePalmare($this);
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
