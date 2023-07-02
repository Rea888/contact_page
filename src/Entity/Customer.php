<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Hiba! Kérjük töltsd ki az összes mezőt!')]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: "Hiba! Név minimum 3 karakter legyen!",
        maxMessage: "Hiba! Név maximum 100 karakter lehet!"
    )]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(message: 'Hiba! Nem valid e-mail cím!')]
    #[Assert\NotBlank(message: 'Hiba! Kérjük töltsd ki az összes mezőt!')]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Hiba! Kérjük töltsd ki az összes mezőt!')]
    #[Assert\Length(
        min: 10,
        max: 500,
        minMessage: "Hiba! Üzenet szövege minimum 10 karakter legyen!",
        maxMessage: "Hiba! Üzenet szövege maximum 500 karakter lehet!"
    )]
    private ?string $content = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }
}
