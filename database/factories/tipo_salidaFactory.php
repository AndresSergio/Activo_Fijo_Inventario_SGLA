<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tipo_salida_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$this->cod_tip_salida=1;
$this->tipo_salida=['TRANSFERENCIA','PRESTAMO','MANTENIMIENTO','BAJA'];
$factory->define(tipo_salida_af::class, function (Faker $faker) {
    $cod_tip_salida=$this->cod_tip_salida++;
    $cod_n=substr($this->tipo_salida[$cod_tip_salida-1], 0, 3);
    return [
        'codigo' => $cod_n.'00'.$cod_tip_salida,
        'nombre' => $this->tipo_salida[$cod_tip_salida-1],
        'descripcion' => 'SALIDA POR '.$this->tipo_salida[$cod_tip_salida-1],
        'estado' => 1
    ];
});
