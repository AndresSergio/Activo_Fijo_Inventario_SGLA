<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\turno_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(turno_af::class, function (Faker $faker) {
  
    return [
        'descripcion' => '24/7',
        'horario_ini' => '00:00:00',
        'horario_fin' => '00:00:00',
        'estado' => 1
    ];
});
