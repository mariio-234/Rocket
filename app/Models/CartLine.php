<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartLine extends Model
{
    use HasFactory;
    protected $table = 'cart-lines';

    public function cart(){
        return $this-> belongsTo( Cart::class );
    }

    public function product(){
        return $this-> belongsTo(Product::class);
    }
}
