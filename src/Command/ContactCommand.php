<?php

namespace App\Command;

class ContactCommand
{
    private ?string $title;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $telephone;
    private ?string $message;


    public function setTitle(?string $title): ContactCommand
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setFirstName(?string $firstName): ContactCommand
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setLastName(?string $lastName): ContactCommand
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setTelephone(?string $telephone): ContactCommand
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setMessage(?string $message): ContactCommand
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}
