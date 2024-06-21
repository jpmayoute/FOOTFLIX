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
    private ?string $name = null;

    /**
     * @var Collection<int, PlayerClubYear>
     */
    #[ORM\OneToMany(targetEntity: PlayerClubYear::class, mappedBy: 'club')]
    private Collection $playerClubYears;

    public function __construct()
    {
        $this->playerClubYears = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, PlayerClubYear>
     */
    public function getPlayerClubYears(): Collection
    {
        return $this->playerClubYears;
    }

    public function addPlayerClubYear(PlayerClubYear $playerClubYear): static
    {
        if (!$this->playerClubYears->contains($playerClubYear)) {
            $this->playerClubYears->add($playerClubYear);
            $playerClubYear->setClub($this);
        }

        return $this;
    }

    public function removePlayerClubYear(PlayerClubYear $playerClubYear): static
    {
        if ($this->playerClubYears->removeElement($playerClubYear)) {
            // set the owning side to null (unless already changed)
            if ($playerClubYear->getClub() === $this) {
                $playerClubYear->setClub(null);
            }
        }

        return $this;
    }
}
