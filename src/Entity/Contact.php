<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

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
    private ?string $other = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(type:"string", nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(type:"string", nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: "string", length: 11, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $message = null;

    #[ORM\Column(type:"string", nullable: true)]
    private ?string $adminMessage = null;

    #[ORM\Column(type: "integer", options: ["default" => 0])]
    private ?int $adminReplied = 0;

    #[ORM\Column(type:"datetime", nullable: true)]
    private ?DateTimeInterface $archivedDate = null;

    #[ORM\Column(type:"datetime", nullable: true)]
    private ?DateTimeInterface $createdDate = null;

    public function setId(?int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTitle(?string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setOther(?string $other)
    {
        $this->other = $other;
        return $this;
    }

    public function getOther(): ?string
    {
        return $this->other;
    }

    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setTelephone(?string $telephone)
    {
        $this->telephone =  str_replace(' ', '', $telephone);
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setMessage(?string $message)
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setAdminMessage(?string $adminMessage): Contact
    {
        $this->adminMessage = $adminMessage;
        return $this;
    }

    public function getAdminMessage(): ?string
    {
        return $this->adminMessage;
    }

    public function setAdminReplied(?int $replied): Contact
    {
        $this->adminReplied = $replied;
        return $this;
    }

    public function getAdminReplied(): ? int
    {
        return $this->adminReplied;
    }

    public function setArchivedDate(?DateTimeInterface $dateTime): Contact
    {
        $this->archivedDate = $dateTime;
        return $this;
    }

    public function getArchivedDate(): ?DateTimeInterface
    {
        return $this->archivedDate;
    }

    public function setCreatedDate(?DateTimeInterface $createdDate): Contact
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    public function getCreatedDate(): ?DateTimeInterface
    {
        return $this->createdDate;
    }

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if ($this->title === 'other' && is_null($this->other)) {
            $context->buildViolation('Need to specify a title, if other is selected')
                ->addViolation();
        }
    }
}
