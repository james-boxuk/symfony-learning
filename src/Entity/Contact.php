<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(type:"string", nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(type: "string", length: 11, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}
