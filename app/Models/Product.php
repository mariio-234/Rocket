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

   

    protected $table='product';

   public function model(){

        return $this->belongsTo(TheModel::class);
    }

    public function cartline(){
        return $this->hasMany(CartLine::class);
    }

    public function scopeListTrendsProducts($query){
        return $query->where('active',true)->whereBetween('updated_at', ['2022-11-28', '2022-12-04']);
    }

    public function stock(){
        return $this->hasMany(Stock::class);
    }

    public function rates(){
        return $this->hasMany(Rates::class);
    }

}
