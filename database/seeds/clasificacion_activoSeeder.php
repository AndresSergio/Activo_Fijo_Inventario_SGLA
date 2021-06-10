<?php

use Illuminate\Database\Seeder;
use App\Models\calificacion_acti_af;

class clasificacion_activoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(calificacion_acti_af::class,3)->create();
    }
}
