<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=32)
     * @Assert\Email(
     *  message = "The email '{{ value }}' is not a valid email."
     * )
     **/
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity=Sector::class, inversedBy="companies")
     */
    private $sectorCompany;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSectorCompany(): ?Sector
    {
        return $this->sectorCompany;
    }

    public function setSectorCompany(?Sector $sectorCompany): self
    {
        $this->sectorCompany = $sectorCompany;

        return $this;
    }
}
