<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table='carts';

    protected $fillable=[
        'id',
        'uuid',
        'active',
        'order_id',
        'user_id'

    ];

    public function lines(){
        return $this->hasMany(CartLine::class);
    }

    public function coupon(){
        return $this-> belongsTo( Coupon::class );
    }
}
