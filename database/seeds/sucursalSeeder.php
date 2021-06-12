<?php

use Illuminate\Database\Seeder;
use App\Models\sucursal_af;

class sucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(sucursal_af::class,3)->create();
    }
}
