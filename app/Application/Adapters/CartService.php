<?php

namespace App\Application\Adapters;

use App\Application\Commands\AddItemToCartCommand;
use App\Application\Ports\ICartService;
use App\Domain\CartItem;
use App\Domain\Ports\ICartRepository;

class CartService implements ICartService
{

    public ICartRepository $cartRepository;

    public function __construct(ICartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function addItemToCart(AddItemToCartCommand $addItemToCartCommand)
    {

        $product = $addItemToCartCommand->product;
        $quantity = $addItemToCartCommand->quantity;

        $cartItem = new CartItem($product->productId, $product->price, $quantity);

        $this->cartRepository->addItem($cartItem);
    }
}
