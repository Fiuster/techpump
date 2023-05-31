<?php

namespace App\Infrastructure\Adapters;

use App\Domain\Cart;
use App\Domain\CartItem;
use App\Domain\Ports\ICartRepository;

class CartRepository implements ICartRepository
{

    public function save(Cart $cart)
    {
    }

    public function addItem(CartItem $cartItem)
    {
    }
}
