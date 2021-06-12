<?php

use Illuminate\Database\Seeder;
use App\Models\tipo_salida_af;

class tipo_salidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tipo_salida_af::class,4)->create();
    }
}
