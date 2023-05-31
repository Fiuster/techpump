<?php

namespace App\Domain;

readonly class Product
{
    public string $productId;

    public string $name;

    public string $description;

    public float $price;

    public function __construct(string $productId, string $name, string $description, float $price)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}
