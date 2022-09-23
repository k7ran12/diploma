<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 *
 * @property $id
 * @property $cantidad_diplomas
 * @property $top_maximo_diploma
 * @property $descripcion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Event extends Model
{

    static $rules = [
		'cantidad_diplomas' => 'required',
		'top_maximo_diploma' => 'required',
		'descripcion' => 'required',
        'nombre_evento' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_evento','cantidad_diplomas','top_maximo_diploma','descripcion','estado'];



}
