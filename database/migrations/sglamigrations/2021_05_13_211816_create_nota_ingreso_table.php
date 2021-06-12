<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_ingreso', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nro_doc', 15)->unique('UQ_nota_ingreso_nro_doc');
            $table->dateTime('fecha_ingr');
            $table->string('movimiento', 10)->nullable()->index('movimiento');
            $table->string('suc_origen', 50)->nullable();
            $table->string('usuario', 20);
            $table->dateTime('fec_registro');
            $table->integer('idalmacen');
            $table->integer('id_origen');
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
        Schema::dropIfExists('nota_ingreso');
    }
}
