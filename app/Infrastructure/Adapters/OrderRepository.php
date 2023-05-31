<?php

namespace App\Infrastructure\Adapters;

use App\Domain\Order;
use App\Domain\Ports\IOrderRepository;

class OrderRepository implements IOrderRepository
{

    public function save(Order $order)
    {
    }
}
