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
    #[Assert\NotBlank(message: 'Error! Please fill out all the fields!')]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: "Error! Name should be at least 3 characters!",
        maxMessage: "Error! Name can be up to 100 characters!"
    )]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(message: 'Error! Invalid email address!')]
    #[Assert\NotBlank(message: 'Error! Please fill out all the fields!')]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Error! Please fill out all the fields!')]
    #[Assert\Length(
        min: 10,
        max: 500,
        minMessage: "Error! Message should be at least 10 characters!",
        maxMessage: "Error! Message can be up to 500 characters!"
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
