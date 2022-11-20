<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Log;

//IMPORTAMOS LOS CONTROLADORES
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\UserController;

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

/*Route::post('/cart', function(){
    return 'Creacion del carrito';
    log::debug('POST /cart Creamos el carrito.');
});
*/
Route:: group(['prefix' => 'admin'], function()
{

Route::post('/cart', [CartController::class, 'CreateCart']);


//GET Recuperacion del carrito
/*Route::get('/cart/{id}', function($id){
    return 'Recuperacion del carrito' .$id;
    log::debug('GET /cart/{id} Recuperacion del carrito.');
});
*/
Route:: group(['prefix' => 'user'], function()
{

Route::get('/cart/{id}', [CartController::class, 'getCartbyId']);
});


//POST Añadir producto al carrito

/*Route::post('/cart/{id}/product', function($id){
    return 'Añadir un producto al carrito' .$id;

});
*/

Route::post('/cart/{id}/product',[CartController::class, 'AddCartToProduct']);

//PUT Quitar un producto del carrito

/*

Route::put('/cart/{id}/product', function($id){
    return 'Quitar un producto al carrito' .$id;

});
*/

Route::put('/cart/{id}/product',[CartController::class, 'RemoveProductToCart']);


//DELETE Borrar un producto del carrito

/*Route::delete('/cart/{id}/line{id_line}', function($id, $idline){
    return 'Borrar un producto del carrito de una linea' .$id . $idline;

});
*/

Route::delete('/cart/{id}/line/{id_line}',[CartController::class, 'DeleteProductToCart']);


//POST Añadir un cupon

/*Route::post('/cart/{id}/coupon', function($id){
    return 'Añadir un cupon'. $id;
    log::debug('Añadimos un cupon.');

});
*/
Route::post('/cart/{id}/coupon',[CartController::class, 'AddCouponToCart']);

//DELETE Borrar un cupon

/*Route::delete('/cart/{id}/coupon', function($id){
    return 'Borrar un cupon'. $id;
});
*/
Route::delete('/cart/{id}/coupon', [CartController::class, 'DeleteCouponToCart']);

});


//---------------------------------------------------------------------------
                            // CHECKOUT PEDIDOS
//----------------------------------------------------------------------------

//POST Creacion de pedido

/*Route::post('/checkout', function(){
    return 'Creacion del pedido';
});
*/
Route::post('/checkout', [CheckoutController::class, 'createCheckout']);


//---------------------------------------------------------------------------
                            // USUARIOS
//----------------------------------------------------------------------------

//Login
/*Route::post('/user/login', function(){
    return 'Login';

});
*/

Route:: group(['prefix' => 'admin'], function()
{
Route::post('/user/login', [UserController::class, 'doLoginUser']);



//POST Crear usuario

/*Route::post('/user/register', function(){
    return 'Creacion de usuario';

});
*/
Route::post('/user/register', [UserController::class, 'createUser']);



//ACTUALIZAR USUARIO

/*Route::put('/user/{id}', function($id){
    return 'Actualizacion de usuario'. $id;

});
*/
Route::put('/user/{id}', [UserController::class, 'updateUser']);

//DELETE Dar de baja al usuario

/*Route::delete('/user/{id}', function($id){
    return 'Baja del usuario'.$id;
});
*/
Route::delete('/user/{id}', [UserController::class, 'removeUser'])->middleware('check.permissions');

//GET Listado de favoritos


/*Route::get('/user/{id}/favorite', function($id){
    return 'Listado de Favoritos' .$id;

});
*/

Route:: group(['prefix' => 'users'], function()
{
Route::get('/user/{id}/favorite', [UserController::class, 'listFavorites']);
});

//POST Añadir a favoritos

/*

Route::post('/user/{id}/favorite/{product}', function($id, $product){

    return 'Añadir a favoritos el producto del usuario' .$id .','.$product;

});
*/
Route::post('/user/{id}/favorite/{product}',[UserController::class, 'addProductToFavorites']);

/*

//DELETE Eliminar de favoritos

Route::delete('/user/{id}/favorite/{product}', function($id, $product){
    return 'Eliminar de favoritos' .$id .',' .$product;

});
*/
Route::delete('/user/{id}/favorite/{product}', [UserController::class, 'removeProductsToFavorites']);

});


//GET Listado de pedidos

/*Route::get('/user/{id}/orders', function($id){
    return 'Listado de pedidos' .$id;
});
*/

Route::get('/user/{id}/orders', [UserController::class, 'listOrders']);

//GET Listado de comentarios del usuario

/*Route::get('/user/{id}/comments', function($id){

    return 'Listado de comentarios del usuario'. $id;
});
*/
Route::get('/user/{id}/comments', [UserController::class, 'listComments']);


//---------------------------------------------------------------------------
                            // NEWSLETTER
//----------------------------------------------------------------------------
//Creacion del newsletter
/*Route::post('/newsletter', function(){

    return 'Creacion de newsletter';
});
*/
Route::post('/newsletter', [NewsLetterController::class, 'createNewsletter']);


//Eliminar una newsletter 

/*Route::delete('/newsletter', function(){

    return 'Eliminar una newsletter';
});
*/

Route::delete('/newsletter', [NewsLetterController::class, 'removeNewsletter']);

//---------------------------------------------------------------------------
                            // CATEGOTIAS
//----------------------------------------------------------------------------

//Recuperar categoria

/*Route::get('/category/{id}', function($id){

    return 'Recuperar categoria'. $id;
});
*/
Route::get('/category/{id}',[CategoryController::class, 'getCategoryById']);


//---------------------------------------------------------------------------
                            // MODELOS
//----------------------------------------------------------------------------

//Recuperar modelo
/*Route::get('/model/{id}', function($id){

    return 'Recuperar modelo'. $id;
});
*/

Route::get('/model/{id}', [ModelController::class, 'getModelById']);


//GET Listado de comentarios de un modelo
/*Route::get('/model/{id}/comment', function($id){

    return 'Listado de comentarios de un modelo'. $id;
});
*/
Route::get('/model/{id}/comment', [ModelController::class, 'getCommentsByModel']);


//POST Creacion de comentarios
/*Route::post('/model/{id}/comment', function($id){

    return 'Creacion de un comentario'. $id;
});
*/

Route::post('/model/{id}/comment', [ModelController::class, 'createCommentsByModel']);

//---------------------------------------------------------------------------
                            // GESTIÓN DEL MENÚ
//----------------------------------------------------------------------------
//GET Recuperacion del menu
/*Route::get('/menu', function(){

    return 'Recuperacion del menu';
});
*/
Route::get('/menu', [MenuController::class, 'getMenus']);

//GET Recuperar un menu 

/*Route::get('/menu/{id}', function($id){

    return 'Recuperacion del menu' .$id;
});
*/
Route::get('/menu/{id}', [MenuController::class, 'getMenu']);









