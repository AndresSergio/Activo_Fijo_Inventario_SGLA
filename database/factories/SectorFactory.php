<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\sector_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$this->cod_sect=1;
$this->sectores=['MANTENIMIENTO','BAJAS','JEFATURA','SERVICIOS','RECLAMOS'];

$factory->define(sector_af::class, function (Faker $faker) {
    $cod_sect=$this->cod_sect++;
    $cod_n=substr($this->sectores[$cod_sect-1], 0, 3);
  /*   $nun='00'+($cod_sect); */
    return [
        'codigo' => $cod_n.'00'.$cod_sect,
        'id_area' => $faker->numberBetween(1,5),
        'cod_suc' => $faker->numberBetween(1,3),
        'nombre' => $this->sectores[$cod_sect-1],
        'descripcion' => 'SECTOR DE '.$this->sectores[$cod_sect-1],
        'estado' => 1,
    ];
});
