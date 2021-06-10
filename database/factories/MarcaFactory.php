<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\marca_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$this->cod_marcas=1;
$this->marcas=['SIN MARCA','SAMSUMG','HUAWEI','TRAMONTINA'];

$factory->define(marca_af::class, function (Faker $faker) {
    $cod_marcas=$this->cod_marcas++;
  
    return [
        'nombre' => $this->marcas[$cod_marcas-1],
        'descripcion' => $this->marcas[$cod_marcas-1],
        'estado' => 1
    ];
});
