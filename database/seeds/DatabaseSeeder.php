<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->dropTable([
            'tipo_documento_af',
            'calificacion_acti_af',
            'marca_af',
            'modelo_af',
            'tipo_salida_af',
            'tipo_ingreso_af',
            'tipo_resp_af',
            'turno_af',
            'sector_af',
            'area_af', 
            'sucursal_af', 
            'empresa_af' 
           
        ]);
         $this->call(tipo_docSeeder::class);
         $this->call(clasificacion_activoSeeder::class);
         $this->call(marcaSeeder::class);
         $this->call(modeloSeeder::class);
         $this->call(tipo_salidaSeeder::class);
         $this->call(tipo_ingresoSeeder::class);
         $this->call(tipo_respSeeder::class);
         $this->call(turnoSeeder::class);
         $this->call(empresaSeeder::class);
         $this->call(sucursalSeeder::class);
         $this->call(areaSeeder::class);
         $this->call(sectorSeeder::class);
         /* $this->call(MesaSeeder::class); */
         /* $this->call(SucursalSeeder::class); */
         
    }

    protected function dropTable( array $tables)
    {
       
        foreach ($tables as $table) {
          
           DB::statement('DELETE FROM '.$table);
           DB::statement('alter table '.$table.' AUTO_INCREMENT=1;');
        }
   
    }
}
