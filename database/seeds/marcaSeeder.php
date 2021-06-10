<?php

use Illuminate\Database\Seeder;
use App\Models\marca_af;

class marcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(marca_af::class,4)->create();
    }
}
