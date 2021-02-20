<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'imieProf',
        'nazwiskoProf',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function przedmiots()
    {
        return $this->belongsToMany('App\Models\Przedmiot');
    }
    public function mains(){
        return $this->belongsToMany('App\Models\Main');
    }
}
