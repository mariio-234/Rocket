<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Models\Category; 

use App\Models\TheModel;
use App\Models\Product;

class CategoryController extends Controller
{
    public function getCategoryById($id){
        log::debug('GET /category/{id} Recuperacion de la categoria.');

        //RECUPERAMOS LA CATEGORIA CON UN ID ESPECIFICO
        $datos=Category::find($id);

        //LA MOSTRAMOS EN JSON
        return response()->json($datos);
    }

    public function getCategoryEachProduct(){
        return response()->json(Category::with('model.products')->paginate(10));
    }
}
