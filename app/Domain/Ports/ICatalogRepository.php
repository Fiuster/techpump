<?php

namespace App\Domain\Ports;

use App\Domain\Cart;
use App\Domain\CartItem;

interface ICatalogRepository
{
    public function getAllProducts(float $priceFrom): array;
}
