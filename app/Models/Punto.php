<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Punto
 *
 * @property $id
 * @property $lugar_contacto
 * @property $puntos
 * @property $event_id
 * @property $participant_id
 * @property $fecha
 * @property $banda_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Punto extends Model
{

    static $rules = [
		'lugar_contacto' => 'required',
		'puntos' => 'required',
		'banda_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lugar_contacto','puntos','participant_id','fecha','banda_id'];

    public function bandas()
    {
        return $this->hasOne('App\Models\Banda', 'id', 'banda_id');

    }


}
