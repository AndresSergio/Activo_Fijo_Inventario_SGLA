<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDevolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_devolucion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nro_factura', 15);
            $table->string('cod_item', 15);
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('serie', 20)->nullable();
            $table->decimal('cantidad', 12);
            $table->smallInteger('estado');
            $table->integer('id_devolucion')->index('id_devolucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_devolucion');
    }
}
