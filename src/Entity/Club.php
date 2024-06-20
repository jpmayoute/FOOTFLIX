<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $club_name = null;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\ManyToMany(targetEntity: Player::class, mappedBy: 'clubs')]
    private Collection $players;

    /**
     * @var Collection<int, PlayerClubYear>
     */
    #[ORM\ManyToMany(targetEntity: PlayerClubYear::class, inversedBy: 'clubs')]
    private Collection $player_club_year;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->player_club_year = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubName(): ?string
    {
        return $this->club_name;
    }

    public function setClubName(string $club_name): static
    {
        $this->club_name = $club_name;

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
            $player->addClub($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        if ($this->players->removeElement($player)) {
            $player->removeClub($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayerClubYear>
     */
    public function getPlayerClubYear(): Collection
    {
        return $this->player_club_year;
    }

    public function addPlayerClubYear(PlayerClubYear $playerClubYear): static
    {
        if (!$this->player_club_year->contains($playerClubYear)) {
            $this->player_club_year->add($playerClubYear);
        }

        return $this;
    }

    public function removePlayerClubYear(PlayerClubYear $playerClubYear): static
    {
        $this->player_club_year->removeElement($playerClubYear);

        return $this;
    }
}
