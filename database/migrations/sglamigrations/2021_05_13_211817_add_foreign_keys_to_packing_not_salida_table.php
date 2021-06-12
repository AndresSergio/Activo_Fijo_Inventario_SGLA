<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPackingNotSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packing_not_salida', function (Blueprint $table) {
            $table->foreign('nro_docu', 'FK_packing_pedido_nota_salida')->references('nro_docu')->on('nota_salida')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packing_not_salida', function (Blueprint $table) {
            $table->dropForeign('FK_packing_pedido_nota_salida');
        });
    }
}
