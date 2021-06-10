<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\sucursal_af;
use App\Models\empresa_af;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$this->cod_suc=1;
$this->cod_empre=1;
$this->sucursales=['MONTERO','CENTRAL-SANTA CRUZ','NORTE-INTEGRADO'];
/* $this->empresa=DB::table('empresa_af')->select('id')->get(); */
/* dd($empresa); */
$factory->define(sucursal_af::class, function (Faker $faker) {
    $cod_suc=$this->cod_suc++;
    $cod_emp=$this->cod_empre++;
    /* dd($empresa); */
  /* print_r($this->empresa); */
    return [
        'codigo' =>'0000'.$cod_suc,
        'descripcion' => $this->sucursales[$cod_suc-1],
        'id_empresa' => $cod_emp,
        'estado' => 1,
        /* 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10), */
    ];
});
