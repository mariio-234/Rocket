<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Stock extends Model
{
    use HasFactory;

    protected $table='stock';
    protected $foreignKey='product';

    protected $fillable=[
        'product',
        'stock'
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
