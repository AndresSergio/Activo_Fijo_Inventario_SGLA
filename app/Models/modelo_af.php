<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class modelo_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modelo_af';
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
    protected $fillable = ['id', 'nombre', 'descripcion', 'estado'];

    
}
