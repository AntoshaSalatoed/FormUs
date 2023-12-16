<?php

namespace App\Entity;

use App\Repository\UserTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserTableRepository::class)]
class UserTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserText $text = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserEmail $email = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserColor $color = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserFigure $figure = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserImage $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?UserText
    {
        return $this->text;
    }

    public function setText(?UserText $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getEmail(): ?UserEmail
    {
        return $this->email;
    }

    public function setEmail(?UserEmail $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getColor(): ?UserColor
    {
        return $this->color;
    }

    public function setColor(?UserColor $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getFigure(): ?UserFigure
    {
        return $this->figure;
    }

    public function setFigure(?UserFigure $figure): static
    {
        $this->figure = $figure;

        return $this;
    }

    public function getImage(): ?UserImage
    {
        return $this->image;
    }

    public function setImage(?UserImage $image): static
    {
        $this->image = $image;

        return $this;
    }
}
