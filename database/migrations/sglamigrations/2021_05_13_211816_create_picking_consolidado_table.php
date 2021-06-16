<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickingConsolidadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picking_consolidado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cod_item', 15);
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('serie', 20)->nullable();
            $table->decimal('cantidad', 12);
            $table->decimal('cant_picking', 12);
            $table->string('ubicacion', 20);
            $table->dateTime('fecha_regi');
            $table->dateTime('fecha_pick')->nullable();
            $table->integer('id_consolidado')->index('id_consolidado');
            $table->integer('id_almacen')->index('id_almacen');
            $table->string('usuario', 20);
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
        Schema::dropIfExists('picking_consolidado');
    }
}
