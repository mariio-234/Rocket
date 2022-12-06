<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TheModel;
use App\Models\Product;

class ModelController extends Controller
{
    public function getModelById($id){
        return response()->json('Recuperar el modelo'. $id);
    }

    public function getCommentsByModel($id){
        return response()->json('Listado de comentarios de un modelo'. $id);
    }

    public function createCommentsByModel($id){
        return response()->json('Creacion de un comentario del modelo'. $id);
    }

    public function getProducts(){
        return response()->json(TheModel::with('products.stock', 'products.rates')->limit(10)->get());
       }
}
