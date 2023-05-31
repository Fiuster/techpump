<?php

namespace App\Application\Commands;

use App\Domain\Product;

readonly class AddItemToCartCommand
{

    public Product $product;

    public int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
}
