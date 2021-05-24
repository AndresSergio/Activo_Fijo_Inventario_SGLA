<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class marca_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marca_af';

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
