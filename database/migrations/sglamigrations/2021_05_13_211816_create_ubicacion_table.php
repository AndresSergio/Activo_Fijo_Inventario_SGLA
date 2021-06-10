<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 20)->unique('UQ_ubicacion_codigo');
            $table->string('cod_area', 10);
            $table->string('cod_rack', 10);
            $table->string('cod_colu', 10);
            $table->string('cod_fila', 10);
            $table->string('posicion', 10);
            $table->integer('id_rack');
            $table->smallInteger('estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion');
    }
}
