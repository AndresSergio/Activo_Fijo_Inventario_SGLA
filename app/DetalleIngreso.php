<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    //
    protected $table = 'detalle_ingr_af';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [        
        'id_item', 
        'id_ingreso', 
        'det_descripcion', 
        'cantidad',
        'estado'
    ];
    protected $guarded =[
    ];
}
