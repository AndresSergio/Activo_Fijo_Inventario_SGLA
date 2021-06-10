<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\empresa_af;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$this->cod_emp=1;
$this->empresas=['MERCANTIL SANTA CRUZ','BANCO SOL','BANCO UNIÓN','VIVA','ENTEL'];

$factory->define(empresa_af::class, function (Faker $faker) {
    $cod_emp=$this->cod_emp++;
  
    return [
        'nombre' => $this->empresas[$cod_emp-1],
        'nit' => '821445301'.$cod_emp,
        'descripcion' => 'EMPRESA DE SERVICIOS',
        'estado' => 1,
        /* 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10), */
    ];
});
