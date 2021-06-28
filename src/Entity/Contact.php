<?php

namespace App\Entity;

use App\Entity\Gite;
use Symfony\Component\Validator\Constraints as Assert;

class Contact{

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3,max=30)
     */
    private string $firstName;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3,max=30)
     */
    private string $lastName;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private string $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10,max=10)
     */
    private string $phone;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10,max=500)
     */
    private string $message;

    private Gite $gite;

    /**
     * Get the value of firstName
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @param string $phone
     *
     * @return self
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of gite
     *
     * @return Gite
     */
    public function getGite(): Gite
    {
        return $this->gite;
    }

    /**
     * Set the value of gite
     *
     * @param Gite $gite
     *
     * @return self
     */
    public function setGite(Gite $gite): self
    {
        $this->gite = $gite;

        return $this;
    }
}
