<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{

    protected $table='newsletter';

    use HasFactory;

    public function scopeActiveNewsletterEachSex($query){
        $query->where('active',true) -> groupBy('sex','id');
    }
}
