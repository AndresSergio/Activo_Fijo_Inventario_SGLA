<?php

use Illuminate\Database\Seeder;
use App\tipo_doc_af;

class tipo_docSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tipo_doc_af::class,2)->create();
    }
}
