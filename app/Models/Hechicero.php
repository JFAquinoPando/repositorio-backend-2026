<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hechicero extends Model
{
    protected $fillable = [
        'nombre',
        'grado',
        'tecnica',
        'activo',
        'imagen',
    ];
}
