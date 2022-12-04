<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'size',
        'model_id',
        'active'
    ];

   public function model(){

        return $this->belongsTo(TheModel::class);
    }

    public function cartline(){
        return $this->hasMany(CartLine::class);
    }

}
