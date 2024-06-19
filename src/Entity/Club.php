<?php

namespace App\Entity;

use App\Repository\ClubRepository;
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

    #[ORM\Column]
    private ?int $club_year = null;

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

    public function getClubYear(): ?int
    {
        return $this->club_year;
    }

    public function setClubYear(int $club_year): static
    {
        $this->club_year = $club_year;

        return $this;
    }
}
