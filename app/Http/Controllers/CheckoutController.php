<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function createCheckout(){
        return response()->json('Creacion del pedido');
    }
}
