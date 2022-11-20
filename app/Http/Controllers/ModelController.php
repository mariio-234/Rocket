<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
