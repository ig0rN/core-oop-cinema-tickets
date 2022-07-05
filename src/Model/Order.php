<?php

namespace Cinema\Model;

use DateTimeImmutable;
use DateTimeInterface;

class Order
{
    private DateTimeInterface $orderDate;

    /**
     * @var Product[]
     */
    private array $products;

    private ?float $subtotal = null;
    private ?float $taxes = null;
    private ?float $grandTotal = null;

    public function __construct()
    {
        $this->orderDate = new DateTimeImmutable();
    }

    public function getOrderDate(): DateTimeInterface
    {
        return $this->orderDate;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): Order
    {
        $this->products = $products;

        return $this;
    }

    public function getSubtotal(): ?float
    {
        return $this->subtotal;
    }

    public function setSubtotal(float $subtotal): Order
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    public function getTaxes(): ?float
    {
        return $this->taxes;
    }

    public function setTaxes(float $taxes): Order
    {
        $this->taxes = $taxes;

        return $this;
    }

    public function getGrandTotal(): ?float
    {
        return $this->grandTotal;
    }

    public function setGrandTotal(float $grandTotal): Order
    {
        $this->grandTotal = $grandTotal;

        return $this;
    }
}
