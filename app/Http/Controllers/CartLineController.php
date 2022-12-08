<?php

namespace App\Http\Controllers;

use App\Models\CartLine;
use Illuminate\Http\Request;
use App\Http\Resources\CartLineResource;
use App\Models\Cart;

class CartLineController extends Controller
{
    public function getCartLineCart(){
        
        return CartLineResource::collection(CartLine::all());

    }

    public function getCartLineByIdCart($id){

        return new CartLineResource(CartLine::findorfail($id));

    }
}
