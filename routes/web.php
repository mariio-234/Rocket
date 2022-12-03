<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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

Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create']);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::post('/product', [ProductController::class, 'store']);

Route::put('/product/{id}', [ProductController::class, 'update']);

Route::delete('/product/{id}', [ProductController::class, 'delete']);

Route::get('product/{id}/edit', [ProductController::class, 'edit']);



Route::get('/', function(){
    
});

Route::get('mailable/', function(){
    $user= \App\Models\User::query()->first();
   // Mail::to('mvp50@alu.ua.es') -> send(new \App\Mail\EmailBajaUser($user));
    return new App\Mail\EmailBajaUser($user);
});




