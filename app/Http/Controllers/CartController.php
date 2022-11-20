<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function getCartbyId($id) {
        log::debug('GET /cart Recuperacion del carrito.');

        
        return response()->json('Recuperacion del carrito' .$id);
        
    }

    public function CreateCart(){
        log::debug('POST /cart Creamos el carrito.');
        
        return response()->json('Creacion del carrito');

    }

    public function AddCartToProduct($id){
        
        return response()->json('Añadir un producto al carrito' .$id);
    }

    public function RemoveProductToCart($id){

        return response()->json('Quitar un producto al carrito' .$id);
    }

    public function DeleteProductToCart($id, $idline){
        
        return response()->json('Borrar un producto del carrito de una linea' .$id .$idline);

    }

    public function AddCouponToCart($id){

        return response()->json('Añadir un cupon'. $id);
        
    }

    public function DeleteCouponToCart($id){

        return response()->json('Borrar un cupon'. $id);
    }
}
