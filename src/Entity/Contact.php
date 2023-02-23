<?php

namespace App\Entity;

use App\Repository\ContactRepository;
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

    #[ORM\Column(type: "string", length: 11, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $message = null;

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

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if ($this->title === 'other') {
            $context->buildViolation('Need to specify a title, if other is selected')
                ->addViolation();
        }
    }
}
