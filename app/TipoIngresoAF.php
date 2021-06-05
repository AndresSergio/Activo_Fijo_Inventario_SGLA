<?php

namespace App;

use App\Models\IngresoCompra;
use Illuminate\Database\Eloquent\Model;

class TipoIngresoAF extends Model
{
    //
    protected $table = 'tipo_ingreso_af';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['nombre','descripcion', 'estado'];

    public function Ingreso_compra(){

        return $this->hasMany(IngresoCompra::class);
    }
}
