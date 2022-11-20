<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function doLoginUser(){
        return response()->json('Login');
    }

    public function createUser(){
        return response()->json('Crear un usuario');
    }

    public function updateUser($id){
        return response()->json('Actualizar el usuario'. $id);
    }

    public function removeUser($id){
        return response()->json('Dar de baja al usuario'. $id);
    }

    public function listFavorites($id){
        return response()->json('Listado de favoritos del usuario'. $id);
    }

    public function addProductToFavorites($id, $product){
        return response()->json('Añadir a favoritos el producto del usuario' . $id. ',' .$product);
    }

    public function removeProductsToFavorites($id, $product){
        return response()->json('Eliminar de favoritos el producto del usuario' . $id. ',' .$product);
        
    }

    public function listOrders($id){
        return response()->json('Listado de pedidos del usuario' .$id);
    }

    public function listComments($id){
        return response()->json('Listado de comentarios del usuario' .$id);
    }
    

}
