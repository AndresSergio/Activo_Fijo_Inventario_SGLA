<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class calificacion_acti_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calificacion_acti_af';
    public $timestamps = false;

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'codigo', 'nombre', 'tiempo_vida', 'estado'];

    public function items(){
        return $this->hasMany(item_af::class);
    }
}
