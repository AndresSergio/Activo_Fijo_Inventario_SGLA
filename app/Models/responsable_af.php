<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class responsable_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'responsable_af';

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
    protected $fillable = ['nombre', 'apellido', 'ci', 'telefono', 'direccion', 'tipo_resp', 'id_sector', 'id_turno', 'estado'];

    
}
