<?php

use Illuminate\Database\Seeder;
use App\Models\modelo_af;

class modeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(modelo_af::class,4)->create();
    }
}
