<?php

namespace App\Entity;

use App\Repository\UserImageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserImageRepository::class)]
class UserImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $Image = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): array
    {
        return $this->Image;
    }

    public function setImage(array $Image): static
    {
        $this->Image = $Image;

        return $this;
    }
}
