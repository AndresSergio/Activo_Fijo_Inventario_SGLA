<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_asig_af extends Model
{
    //
    protected $table = 'detalle_asig_af';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'observacion', 
        'id_almacen_act', 
        'id_documento', 
        'estado'
    ];
}
