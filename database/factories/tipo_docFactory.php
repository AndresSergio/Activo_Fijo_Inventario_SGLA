<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\tipo_doc_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$this->cod_tip_doc=1;
$this->tipo_docu=['SOLICITUD','ASIGNACION'];
$factory->define(tipo_doc_af::class, function (Faker $faker) {
    $cod_tip_doc=$this->cod_tip_doc++;
    return [
        'nombre' => $this->tipo_docu[$cod_tip_doc-1],
        'descripcion' => 'DOCUMENTO QUE RESPALDA LA '.$this->tipo_docu[$cod_tip_doc-1],
        'estado' => 1
    ];
});
