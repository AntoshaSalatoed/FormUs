<?php

namespace App\Entity;

use App\Repository\UserFigureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserFigureRepository::class)]
class UserFigure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Figure = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFigure(): ?string
    {
        return $this->Figure;
    }

    public function setFigure(string $Figure): static
    {
        $this->Figure = $Figure;

        return $this;
    }
}
