<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursal_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('codigo', 15)->unique('codigo');
            $table->string('descripcion', 25);
            $table->integer('id_empresa')->index('id_empresa');
            $table->integer('id_departamento')->index('id_departamento');
            $table->smallInteger('estado')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursal_af');
    }
}
