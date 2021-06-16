<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kardex', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_corte')->index('id_corte');
            $table->string('cod_item', 15)->index('cod_item');
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('serie', 20)->nullable();
            $table->string('ubicacion', 20)->nullable();
            $table->string('cod_bodega', 10)->nullable();
            $table->dateTime('fecha_reg');
            $table->integer('id_respaldo')->nullable();
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
        Schema::dropIfExists('kardex');
    }
}
