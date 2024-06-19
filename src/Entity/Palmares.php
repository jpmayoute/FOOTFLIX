<?php

namespace App\Entity;

use App\Repository\PalmaresRepository;
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
}
