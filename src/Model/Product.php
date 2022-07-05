<?php

namespace Cinema\Model;

class Product
{
    private string $name;
    private int $quantity = 1;
    private string $category;
    private float $price;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function incrementQuantity(): Product
    {
        ++$this->quantity;

        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): Product
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Product
    {
        $this->price = $price;

        return $this;
    }
}
