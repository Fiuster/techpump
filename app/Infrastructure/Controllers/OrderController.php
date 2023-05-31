<?php

namespace App\Infrastructure\Controllers;

use App\Application\Ports\IOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private IOrderService $orderService;

    public function __construct(IOrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function completeOrder(Request $request)
    {
        return 'order';
    }
}
