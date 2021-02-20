<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Przedmiot extends Model
{
    use HasFactory;

    public function profesors(){
        return $this->belongsToMany('App\Models\Profesor');
    }

    public function students(){
        return $this->belongsToMany('App\Models\Student');
    }

    public function mains(){
        return $this->belongsToMany('App\Models\Main');
    }
}
