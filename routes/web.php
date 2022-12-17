<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartLineController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Mail\EmailBaja;
use App\Mail\EmailStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Mail\EmailPaid;
use App\Services\Paypal;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

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
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';


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


Route::get('mailable/', function(){
    $user= User::query()->first();
   // Mail::to('mvp50@alu.ua.es') -> send(new \App\Mail\EmailBajaUser($user));
    return new EmailBaja($user);
});

Route::get('mailable/status', function(){
    $order= Order::query()->first();
   // Mail::to('mvp50@alu.ua.es') -> send(new \App\Mail\EmailBajaUser($user));
    return new EmailStatus($order);
});

Route::get('mailable/paid', function(){
    $order= Order::query()->first();
   // Mail::to('mvp50@alu.ua.es') -> send(new \App\Mail\EmailBajaUser($user));
    return new EmailPaid($order);
});

Route::get('/paypal', function(){
   $paypal= new Paypal();
   $ngrok ='https://f019-85-52-230-66.eu.ngrok.io';
   $invoice = \Illuminate\Support\Str::random();
   $total = 10.00;
   $return = $ngrok. '/return';
   $cancel= $ngrok. '/cancel';
   return $paypal->createOrder($invoice, $total, $return, $cancel);
   $id=data_get($result, 'id');
   Cache::put('order_paypal', $id);
   $url = $result['links'][1]['href'];
   return Redirect::to($url);


});

Route::get('/return', function(Request $request){

    $token = $request->get('token');
    $paypal = new Paypal();
    return $paypal ->confirmOrder($token);

});

Route::get('/cancel', function(Request $request){

});