<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_corte')->index('id_corte');
            $table->string('cod_item', 15);
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('serie', 20)->nullable();
            $table->string('ubicacion', 20)->nullable();
            $table->string('cod_bodega', 10)->nullable();
            $table->string('observacion', 25);
            $table->string('operador', 20);
            $table->dateTime('fecha_reg')->nullable();
            $table->integer('id_resplado')->nullable();
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
        Schema::dropIfExists('inventario');
    }
}
