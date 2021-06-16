<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documento_af extends Model
{
    //
    protected $table = 'documento_af';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'descripcion', 
        'directorio', 
        'fecha_entrega', 
        'fecha_creacion',
        'id_tipo_doc',  
        'id_responsable', 
        'id_trabajador', 
        'estado'
    ];
}
