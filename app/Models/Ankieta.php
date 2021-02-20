<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ankieta extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesor_id',
        'student_id',
        'pytania_id',
        'przedmiot_id',
        'ocena',
    ];
}
