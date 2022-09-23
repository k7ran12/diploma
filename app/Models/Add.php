<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;

    protected $fillable = ['participante', 'banda_id', 'puntos', 'fecha'];

    public function bandas()
    {
        return $this->hasOne('App\Models\Banda', 'id', 'banda_id');

    }
}

