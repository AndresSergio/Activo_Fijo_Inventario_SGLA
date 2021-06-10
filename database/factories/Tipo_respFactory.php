<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tipo_resp_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$this->cod_tip=1;
$this->roles=['ADMINISTRADOR','ENCARGADO','COLABORADOR'];
$factory->define(tipo_resp_af::class, function (Faker $faker) {
    $cod_tip=$this->cod_tip++;
    return [
        'descripcion' => $this->roles[$cod_tip-1],
        'estado' => 1
    ];
});
