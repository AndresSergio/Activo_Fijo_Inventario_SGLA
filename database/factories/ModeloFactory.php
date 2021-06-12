<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\modelo_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$this->cod_modelos=1;
$this->modelos=['SIN MODELO','J5','S6','X12'];

$factory->define(modelo_af::class, function (Faker $faker) {
    $cod_modelos=$this->cod_modelos++;
  
    return [
        'nombre' => $this->modelos[$cod_modelos-1],
        'descripcion' => 'MOVILES',
        'estado' => 1,
        /* 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10), */
    ];
});
