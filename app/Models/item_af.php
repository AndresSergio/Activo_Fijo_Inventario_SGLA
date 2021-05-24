<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'item_af';

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
    protected $fillable = ['id', 'codigo', 'nombre', 'alto', 'ancho', 'largo', 'color', 'lote', 'tiempo_vida', 'control_mante', 'id_clasificacion', 'id_modelo', 'id_marca', 'estado'];

    
}
