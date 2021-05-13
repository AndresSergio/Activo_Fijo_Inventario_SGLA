<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickingNotSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picking_not_salida', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nro_docu', 15)->index('nro_docu');
            $table->string('cod_item', 15);
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('serie', 20)->nullable();
            $table->decimal('cantidad', 12);
            $table->decimal('cant_picking', 12)->nullable();
            $table->dateTime('fecha_regi');
            $table->dateTime('fecha_pick')->nullable();
            $table->string('usuario', 20)->nullable();
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
        Schema::dropIfExists('picking_not_salida');
    }
}
