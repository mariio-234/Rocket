<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function getCategoryById($id){
        log::debug('GET /category/{id} Recuperacion de la categoria.');
        return response()->json('Recuperacion de la categoria'. $id);
    }
}
