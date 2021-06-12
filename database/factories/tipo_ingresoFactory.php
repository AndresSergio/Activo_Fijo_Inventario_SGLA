<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoIngresoAF;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$this->cod_tip_ing=1;
$this->tipo_ing=['COMPRA','TRANSFERENCIA','MANTENIMIENTO','DONACION'];
$factory->define(TipoIngresoAF::class, function (Faker $faker) {
    $cod_tip_ing=$this->cod_tip_ing++;

    return [
        'nombre' => $this->tipo_ing[$cod_tip_ing-1],
        'descripcion' => 'INGRESO POR '.$this->tipo_ing[$cod_tip_ing-1],
        'estado' => 1
    ];
});
