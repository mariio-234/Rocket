<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';

    public function scopeOrderPaids($query){
        return $query->where('paid',true)->groupby('status','id');

    }
}
