<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    static $rules = [
		'nombre' => 'required',
		'cantidad_puntos' => 'required',
        'event_id' => 'required',
        'lugar_contacto' => 'required',
        'select_banda' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','cantidad_puntos', 'cantidad_contactos', 'event_id'];

    //Relacion Muchos a Muchos

}
