<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenus(){
        return response()->json('Recuperar menus');
    }

    public function getMenu($id){
        return response()->json('Recuperacion del menu'. $id);
    }


}
