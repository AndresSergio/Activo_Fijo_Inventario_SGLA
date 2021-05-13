<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleDevolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_devolucion', function (Blueprint $table) {
            $table->foreign('id_devolucion', 'FK_detalle_devolucion_devolucion')->references('id')->on('devolucion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_devolucion', function (Blueprint $table) {
            $table->dropForeign('FK_detalle_devolucion_devolucion');
        });
    }
}
