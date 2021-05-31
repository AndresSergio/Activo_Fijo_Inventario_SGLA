<?php

namespace App\Models;

use App\IngresoCompra;
use Illuminate\Database\Eloquent\Model;

class sucursal_af extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sucursal_af';
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
    protected $fillable = ['id', 'codigo', 'descripcion', 'id_empresa', 'id_Departamento', 'estado'];

    public function Ingreso_compra(){

        return $this->hasMany(IngresoCompra::class);
    }
}
