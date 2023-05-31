<?php

namespace App\Domain;

readonly class OrderItem
{

    public string $productId;

    public float $price;

    public int $quantity;

    public function __construct(string $productId, float $price, int $quantity)
    {
        $this->productId = $productId;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
