<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_doc_af extends Model
{
    //
    protected $table = 'tipo_documento_af';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'estado'
    ];
}
