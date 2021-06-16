<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cod_item', 15);
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('serie', 20)->nullable();
            $table->decimal('cantidad', 12);
            $table->integer('id_almacen')->index('id_almacen');
            $table->string('ubi_origen', 20);
            $table->string('ubi_destino', 20);
            $table->dateTime('fecha_regi');
            $table->string('tipo_movi', 10);
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
        Schema::dropIfExists('movimientos');
    }
}
