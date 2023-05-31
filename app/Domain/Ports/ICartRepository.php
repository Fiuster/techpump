<?php

namespace App\Domain\Ports;

use App\Domain\Cart;
use App\Domain\CartItem;

interface ICartRepository
{

    public function save(Cart $cart);

    public function addItem(CartItem $cartItem);
}
