<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class almacen_activo_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'almacen_activo_af';
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
    protected $fillable = ['codigo_item', 'serie','observacion','foto', 'id_det_ingreso', 'estado'];

    
}
