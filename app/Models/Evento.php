<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_diplomas',
        'imagen_diploma_1',
        'imagen_diploma_2',
        'imagen_diploma_3',
        'contacto_diploma_1',
        'contacto_diploma_2',
        'contacto_diploma_3',
        'descripcion_actividad',
        'estado',
    ];
}
