<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empresa_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empresa_af';

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
    protected $fillable = ['id', 'nombre', 'nit', 'descripcion', 'estado'];

    
}
