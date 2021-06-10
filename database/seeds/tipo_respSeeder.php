<?php

use Illuminate\Database\Seeder;
use App\Models\tipo_resp_af;

class tipo_respSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tipo_resp_af::class,3)->create();
    }
}
