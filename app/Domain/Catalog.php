<?php

namespace App\Domain;

readonly class Catalog
{
    public array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }
}
