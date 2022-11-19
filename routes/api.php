<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//---------------------------------------------------------------------------
                            // CARRITO
//----------------------------------------------------------------------------
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//POST Crear carrito

Route::post('/cart', function(){
    return 'Creacion del carrito';
    log::debug('POST /cart Creamos el carrito.');
});


//GET Recuperacion del carrito
Route::get('/cart/{id}', function($id){
    return 'Recuperacion del carrito' .$id;
    log::debug('GET /cart/{id} Recuperacion del carrito.');
});

//POST Añadir producto al carrito

Route::post('/cart/{id}/product', function($id){
    return 'Añadir un producto al carrito' .$id;

});

//PUT Quitar un producto del carrito

Route::put('/cart/{id}/product', function($id){
    return 'Añadir un producto al carrito' .$id;

});


//DELETE Borrar un producto del carrito

Route::delete('/cart/{id}/line{id_line}', function($id, $idline){
    return 'Quitar un producto del carrito' .$id . $idline;

});


//POST Añadir un cupon

Route::post('/cart/{id}/coupon', function($id){
    return 'Añadir un cupon'. $id;
    log::debug('Añadimos un cupon.');

});

//DELETE Borrar un cupon

Route::delete('/cart/{id}/coupon', function($id){
    return 'Borrar un cupon'. $id;
});

//---------------------------------------------------------------------------
                            // CHECKOUT PEDIDOS
//----------------------------------------------------------------------------

//POST Creacion de pedido

Route::post('/checkout', function(){
    return 'Creacion del pedido';
});

//---------------------------------------------------------------------------
                            // USUARIOS
//----------------------------------------------------------------------------

//Login
Route::post('/user/login', function(){
    return 'Login';

});

//POST Crear usuario

Route::post('/user/register', function(){
    return 'Creacion de usuario';

});

//ACTUALIZAR USUARIO

Route::put('/user/{id}', function($id){
    return 'Actualizacion de usuario'. $id;

});

//DELETE Dar de baja al usuario

Route::delete('/user/{id}', function($id){
    return 'Baja del usuario'.$id;
});

//GET Listado de favoritos


Route::get('/user/{id}/favorite', function($id){
    return 'Listado de Favoritos' .$id;

});

//POST Añadir a favoritos

Route::post('/user/{id}/favorite/{product}', function($id, $product){

    return 'Añadir a favoritos' .$id .','.$product;

});

//DELETE Eliminar de favoritos

Route::delete('/user/{id}/favorite/{product}', function($id, $product){
    return 'Eliminar de favoritos' .$id .',' .$product;

});

//GET Listado de pedidos

Route::get('/user/{id}/orders', function($id){
    return 'Listado de pedidos' .$id;
});

//GET Listado de comentarios del usuario

Route::get('/user/{id}/comments', function($id){

    return 'Listado de comentarios del usuario'. $id;
});

//---------------------------------------------------------------------------
                            // NEWSLETTER
//----------------------------------------------------------------------------
//Creacion del newsletter
Route::post('/newsletter', function(){

    return 'Creacion de newsletter';
});

//Eliminar una newsletter 
Route::delete('/newsletter', function(){

    return 'Eliminar una newsletter';
});

//---------------------------------------------------------------------------
                            // CATEGOTIAS
//----------------------------------------------------------------------------

//Recuperar categoria

Route::get('/category/{id}', function($id){

    return 'Recuperar categoria'. $id;
});

//---------------------------------------------------------------------------
                            // MODELOS
//----------------------------------------------------------------------------

//Recuperar modelo
Route::get('/model/{id}', function($id){

    return 'Recuperar modelo'. $id;
});

//GET Listado de comentarios de un modelo
Route::get('/model/{id}/comment', function($id){

    return 'Listado de comentarios de un modelo'. $id;
});

//POST Creacion de comentarios
Route::post('/model/{id}/comment', function($id){

    return 'Creacion de un comentario'. $id;
});

//---------------------------------------------------------------------------
                            // GESTIÓN DEL MENÚ
//----------------------------------------------------------------------------
//GET Recuperacion del menu
Route::get('/menu', function(){

    return 'Recuperacion del menu';
});

//GET Recuperar un menu 

Route::get('/menu/{id}', function($id){

    return 'Recuperacion del menu' .$id;
});










