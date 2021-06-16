<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\area_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$this->cod_areas=1;
$this->areas=['GERENCIA','CONTABILIDAD','SISTEMAS','ALMACEN','TESORERIA'];

$factory->define(area_af::class, function (Faker $faker) {
    $cod_areas=$this->cod_areas++;
  
    return [
        'codigo' => 'COD00'.$cod_areas,
        'nombre' => $this->areas[$cod_areas-1],
        'descripcion' => 'AREA DE '.$this->areas[$cod_areas-1],
        'estado' => 1,
        /* 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10), */
    ];
});
