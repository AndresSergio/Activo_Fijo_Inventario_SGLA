<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetMantePreventAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_mante_prevent_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('fecha_alarma');
            $table->integer('tiempo');
            $table->string('motivo', 100)->nullable();
            $table->integer('id_almacen')->index('id_almacen');
            $table->integer('id_mant_preventivo')->index('id_mant_preventivo');
            $table->smallInteger('estado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('det_mante_prevent_af');
    }
}
