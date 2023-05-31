<?php

namespace App\Domain;

readonly class Order
{

    public string $orderId;

    public string $userId;

    public array $orderItems;

    public function __construct(string $orderId, string $userId, array $orderItems)
    {
        $this->orderId = $orderId;
        $this->userId = $userId;
        $this->orderItems = $orderItems;
    }

    public function countProducts()
    {
        return count($this->orderItems);
    }

    public function countItems()
    {
        $count = 0;

        foreach ($this->orderItems as $index => $itemInOrder) {
            $count += $itemInOrder->quantity;
        }

        return $count;
    }
}
