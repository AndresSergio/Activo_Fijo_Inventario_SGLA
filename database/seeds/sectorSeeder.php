<?php

use Illuminate\Database\Seeder;
use App\Models\sector_af;
class sectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(sector_af::class,5)->create();
    }
}
