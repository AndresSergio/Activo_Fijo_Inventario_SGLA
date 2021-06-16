<?php

use Illuminate\Database\Seeder;
use App\Models\turno_af;

class turnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(turno_af::class,1)->create();
    }
}
