<?php

use Illuminate\Database\Seeder;
use App\Models\area_af;

class areaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(area_af::class,5)->create();
        /* empresa_af::create([
            'CI_CLIE'=>1, 
            'NOMBRE_CLIE'=>'ALFREDO COLQUE MONTALVO', 
            'CELULAR_CLIE'=>8214453,
            'DIRECCION_CLIE'=>'AV. PAURITO' 
        ]); */
    }
}
