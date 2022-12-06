<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('product', ProductController::class);
Route::get('/model/products/stock/rates', [ModelController::class, 'getProducts']);

Route::get('/productTrend', [ProductController::class, 'getListTrendsProducts']);

Route::get('/user/{id}', [UserController::class, 'getUserById']);

Route::get('/user', [UserController::class, 'getUsersWithNewsletter']);

Route::get('/order',[OrderController::class, 'getPaidOrders']);

Route::get('/newsletter',[NewsLetterController::class, 'ActiveNewsletterEachSex']);

Route::get('/categoryEachProduct', [CategoryController::class, 'getCategoryEachProduct']);



