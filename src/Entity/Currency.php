<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CurrencyRepository::class)
 */
class Currency
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
    private $currencySend;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $currencyReceive;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $exchange;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrencySend(): ?string
    {
        return $this->currencySend;
    }

    public function setCurrencySend(string $currencySend): self
    {
        $this->currencySend = $currencySend;

        return $this;
    }

    public function getCurrencyReceive(): ?string
    {
        return $this->currencyReceive;
    }

    public function setCurrencyReceive(string $currencyReceive): self
    {
        $this->currencyReceive = $currencyReceive;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getExchange(): ?string
    {
        return $this->exchange;
    }

    public function setExchange(string $exchange): self
    {
        $this->exchange = $exchange;

        return $this;
    }
}
