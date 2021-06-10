<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPickingNotSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('picking_not_salida', function (Blueprint $table) {
            $table->foreign('nro_docu', 'FK_picking_pedido_nota_salida')->references('nro_docu')->on('nota_salida')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('picking_not_salida', function (Blueprint $table) {
            $table->dropForeign('FK_picking_pedido_nota_salida');
        });
    }
}
