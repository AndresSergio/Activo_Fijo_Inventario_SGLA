<?php

namespace App;

use App\Models\TipoIngresoAF;
use App\Models\sucursal_af;
use Illuminate\Database\Eloquent\Model;

class IngresoCompra extends Model
{
    //
    protected $table = 'ingreso_af';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'numero_doc', 
        'directorio', 
        'fecha_reg', 
        'tipo_doc',
        'id_tipo_ingr', 
        'id_sucursal', 
        'id_responsable', 
        'estado'
    ];
    protected $guarded =[
    ];

    public function tipo_ingresoaf()
    {
        return $this->belongsTo(TipoIngresoAF::class);
    } 
    public function sucursalaf()
    {
        return $this->belongsTo(sucursal_af::class);
    }

}
