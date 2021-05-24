<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sector_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sector_af';
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
    protected $fillable = ['id', 'codigo', 'id_area', 'nombre', 'descripcion', 'estado'];

    
}
