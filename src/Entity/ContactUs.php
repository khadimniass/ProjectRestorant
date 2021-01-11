<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class ContactUs
{
  /**
   * @var string|null
   * Assert\NotBlank()
   * Assert\Length(min=2, max=100)
   */
    private $firtsName;

    /**
     * @var string|null
    * @Assert\NotBlank()
    * @Assert\Length(min="2", max="100")
    */

    private $lastName;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/[0-9]{10}/")
     */
    private $phone;

    /**
     * @var string|null
     * @Assert\NotBlanck()
     * @Assert\Email()
     */

    private $email;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $adress;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;



    /**
     * @var Publication|null
     */
    private $publication;

    /**
     * @return string|null
     */
    public function getFirtsName(): ?string
    {
        return $this->firtsName;
    }

    /**
     * @param string|null $firtsName
     */
    public function setFirtsName(?string $firtsName): void
    {
        $this->firtsName = $firtsName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * @param string|null $adress
     */
    public function setAdress(?string $adress): void
    {
        $this->adress = $adress;
    }




    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Publication|null
     */
    public function getPublication(): ?Publication
    {
        return $this->publication;
    }
    /**
     * @param Publication|null $publication
     */
    public function setPublication(?Publication $publication): void
    {
        $this->publication = $publication;
    }
}