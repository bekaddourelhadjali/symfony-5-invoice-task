<?php

namespace App\Entity;

use App\Repository\InvoiceLineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass = InvoiceLineRepository::class)
 */
class InvoiceLine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type= "integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="text")
     * @ORM\JoinColumn(nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     * @ORM\JoinColumn(nullable=false)
     */
    private $amount;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     * @ORM\JoinColumn(nullable=false)
     */
    private $vatAmount;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     * @ORM\JoinColumn(nullable=false)
     */
    private $totalVat;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Invoice" ,inversedBy="invoiceLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $invoice;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getVatAmount()
    {
        return $this->vatAmount;
    }

    /**
     * @param mixed $vatAmount
     */
    public function setVatAmount($vatAmount): void
    {
        $this->vatAmount = $vatAmount;
    }

    /**
     * @return mixed
     */
    public function getTotalVat()
    {
        return $this->totalVat;
    }

    /**
     * @param mixed $totalVat
     */
    public function setTotalVat($totalVat): void
    {
        $this->totalVat = $totalVat;
    }

    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param mixed $invoice
     */
    public function setInvoice($invoice): void
    {
        $this->invoice = $invoice;
    }




}
