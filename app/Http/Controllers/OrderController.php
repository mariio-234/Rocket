<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function getPaidOrders(){
        return response()->json(Order::OrderPaids()->get());
    }
}
