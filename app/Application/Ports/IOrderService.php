<?php

namespace App\Application\Ports;

use App\Application\Commands\CompleteOrderCommand;

interface IOrderService
{

    public function completeOrder(CompleteOrderCommand $completeOrderCommand);
}
