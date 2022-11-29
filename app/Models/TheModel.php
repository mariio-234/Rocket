<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheModel extends Model
{
    use HasFactory;
    protected $table = 'models';

    public function products(){
        return $this-> hasMany( Product::class );
    }

}
