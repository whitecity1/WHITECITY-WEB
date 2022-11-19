<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;
    
    public function lugarturistico(){
        return $this->hasMany('App\Models\Lugarturistico');
    }
}
