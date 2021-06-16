<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingNotSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing_not_salida', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nro_docu', 15)->index('nro_docu');
            $table->string('cod_item', 15);
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('serie', 20)->nullable();
            $table->decimal('cantidad', 12);
            $table->integer('nro_paquete');
            $table->string('tipo_paquete', 25);
            $table->dateTime('fecha_regi');
            $table->smallInteger('estado');
            $table->string('usuario', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packing_not_salida');
    }
}
