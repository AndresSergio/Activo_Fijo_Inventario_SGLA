<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_ingreso', function (Blueprint $table) {
            $table->foreign('cod_item', 'FK_detalle_ingreso_item')->references('codigo')->on('item')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('nro_doc', 'FK_detalle_ingreso_nota_ingreso')->references('nro_doc')->on('nota_ingreso')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_ingreso', function (Blueprint $table) {
            $table->dropForeign('FK_detalle_ingreso_item');
            $table->dropForeign('FK_detalle_ingreso_nota_ingreso');
        });
    }
}
