<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'dpi',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'nit',
        'estados',
    ];
}