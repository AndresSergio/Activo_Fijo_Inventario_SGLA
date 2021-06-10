<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPickingConsolidadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('picking_consolidado', function (Blueprint $table) {
            $table->foreign('id_almacen', 'FK_picking_consolidado_almacen')->references('id')->on('almacen')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_consolidado', 'FK_picking_consolidado_consolidado')->references('id')->on('consolidado')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('picking_consolidado', function (Blueprint $table) {
            $table->dropForeign('FK_picking_consolidado_almacen');
            $table->dropForeign('FK_picking_consolidado_consolidado');
        });
    }
}
