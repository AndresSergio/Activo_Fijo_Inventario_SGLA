<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\calificacion_acti_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$this->cod_cla=1;
$this->clsactivos=['MAQUINARIA','TERRENO','MUEBLES'];

$factory->define(calificacion_acti_af::class, function (Faker $faker) {
    $cod_cla=$this->cod_cla++;
   
    $cod_n=substr($this->clsactivos[$cod_cla-1], 0, 3);
  
    return [
        'codigo' => $cod_n.'00'.$cod_cla,
        'nombre' => $this->clsactivos[$cod_cla-1],
        'tiempo_vida' => 5,
        'estado' => 1
    ];
});
