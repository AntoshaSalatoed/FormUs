<?php

namespace App\Entity;

use App\Repository\UserDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserDataRepository::class)]
class UserData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $textField = null;

    #[ORM\Column(length: 255)]
    private ?string $emailField = null;

    #[ORM\Column(length: 255)]
    private ?string $colorField = null;

    #[ORM\Column(length: 255)]
    private ?string $shapeField = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $imageField = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextField(): ?string
    {
        return $this->textField;
    }

    public function setTextField(string $textField): static
    {
        $this->textField = $textField;

        return $this;
    }

    public function getEmailField(): ?string
    {
        return $this->emailField;
    }

    public function setEmailField(string $emailField): static
    {
        $this->emailField = $emailField;

        return $this;
    }

    public function getColorField(): ?string
    {
        return $this->colorField;
    }

    public function setColorField(string $colorField): static
    {
        $this->colorField = $colorField;

        return $this;
    }

    public function getShapeField(): ?string
    {
        return $this->shapeField;
    }

    public function setShapeField(string $shapeField): static
    {
        $this->shapeField = $shapeField;

        return $this;
    }

    public function getImageField(): array
    {
        return $this->imageField;
    }

    public function setImageField(array $imageField): static
    {
        $this->imageField = $imageField;

        return $this;
    }
}
