<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class CartLine extends Model
{
    use HasFactory;
    protected $table = 'cart_lines';

    /*protected $fillabe =[
        'id',
        'uuid',
        'active',
        'cart_id',
        'product_id',
        'units',

    ];
    */

    public function carts(){
        return $this->belongsTo(Cart::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
