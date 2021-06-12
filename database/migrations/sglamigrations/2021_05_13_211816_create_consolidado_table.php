<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolidadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolidado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descripcion', 70)->nullable();
            $table->dateTime('fecha_ini')->nullable();
            $table->dateTime('fecha_fin')->nullable();
            $table->smallInteger('tipo');
            $table->integer('id_sucursal');
            $table->smallInteger('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consolidado');
    }
}
