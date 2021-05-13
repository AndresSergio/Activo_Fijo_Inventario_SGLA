<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetManteCorrectivoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_mante_correctivo_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('fecha_alarma');
            $table->integer('tiempo');
            $table->string('motivo', 100)->nullable();
            $table->integer('id_salida')->index('id_salida');
            $table->integer('id_mant_correctivo')->index('id_mant_correctivo');
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
        Schema::dropIfExists('det_mante_correctivo_af');
    }
}
