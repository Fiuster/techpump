<?php

namespace App\Application\Ports;

use App\Application\Commands\AddItemToCartCommand;

interface ICartService
{

    public function addItemToCart(AddItemToCartCommand $addItemToCartCommand);
}
