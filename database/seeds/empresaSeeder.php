<?php

use Illuminate\Database\Seeder;
use App\Models\empresa_af;

class empresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(empresa_af::class,3)->create();
        /* empresa_af::create([
            'CI_CLIE'=>1, 
            'NOMBRE_CLIE'=>'ALFREDO COLQUE MONTALVO', 
            'CELULAR_CLIE'=>8214453,
            'DIRECCION_CLIE'=>'AV. PAURITO' 
        ]); */
    }
}
