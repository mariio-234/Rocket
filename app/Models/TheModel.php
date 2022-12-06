<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheModel extends Model
{
    use HasFactory;
    protected $table = 'model';

    protected $fillable=[
        'id',
        'code',
        'name',
        'brand',
        'active',
        'image',
        'description'
    ];

    public function products(){
        return $this-> hasMany( Product::class );
    }

    public function category(){
        return $this->belongsToMany(Category::class, 'category_product');
    }

}
