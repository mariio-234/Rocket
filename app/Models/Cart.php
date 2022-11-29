<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function cartline(){
        return $this-> hasMany( Cart::class );
    }

    public function coupon(){
        return $this-> belongsTo( Coupon::class );
    }
}
