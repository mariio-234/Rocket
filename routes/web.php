<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartLineController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Route;

use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/userbaja/{id}', function ($id) {
    log::debug('Actualizar usuario');
    $user = User::find($id);
    $user->baja = true;
    $user->save();
    return $user;
});

Route::get('/paid/{id}', function ($id) {
    //log::debug('Actualizar usuario');
    $paid = Order::find($id);
    $paid->paid = true;
    $paid->save();
    return $paid;
});

Route::get('/status/{id}', function ($id) {
    log::debug('Actualizar usuario');
    $orderStatus = Order::find($id);
    $orderStatus->status = 2;
    $orderStatus->save();
    return $orderStatus;
});

Route::get('/', function () {
    return view('welcome');
});
Route::resource('product', ProductController::class);

Route::get('/model/products/stock/rates', [ModelController::class, 'getProducts']);

Route::get('/productTrend', [ProductController::class, 'getListTrendsProducts']);

Route::get('/user/{id}', [UserController::class, 'getUserById']);

Route::get('/user', [UserController::class, 'getUsersWithNewsletter']);


Route::get('/order', [OrderController::class, 'getPaidOrders']);

Route::get('/newsletter', [NewsLetterController::class, 'ActiveNewsletterEachSex']);

Route::get('/categoryEachProduct', [CategoryController::class, 'getCategoryEachProduct']);

Route::get('/cartline/{id}/cart', [CartLineController::class, 'getCartLineByIdCart']);

Route::get('/cartline/cart', [CartLineController::class, 'getCartLineCart']);
