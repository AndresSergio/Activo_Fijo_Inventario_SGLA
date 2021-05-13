<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleSalidaAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_salida_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_salida')->index('id_salida');
            $table->integer('id_almacen')->index('id_almacen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_salida_af');
    }
}
