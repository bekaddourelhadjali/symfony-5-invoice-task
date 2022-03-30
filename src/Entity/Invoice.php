<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass = InvoiceRepository::class)
 */
class Invoice
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type= "integer")
     */
    private $id;

    /**
     * Invoice constructor.
     */
    public function __construct()
    {
        $this->invoiceLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type= "date")
     * @ORM\JoinColumn(nullable=false)
     */
    private $date;

    /**
     * @ORM\Column(type= "integer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $number;

    /**
     * @ORM\Column(type= "integer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customerId;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InvoiceLine",mappedBy="invoice", cascade={"persist"})
     *
     */
    private $invoiceLines;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
    }



    /**
     * @return Collection
     */
    public function getInvoiceLines()
    {
        return $this->invoiceLines;
    }


    public function addLine(InvoiceLine $line) {
        $line->setInvoice($this);
        $this->invoiceLines->add($line);
    }

}
