<?php

namespace App\Domain\Ports;

use App\Domain\Order;

interface IOrderRepository {

    public function save(Order $order);

}