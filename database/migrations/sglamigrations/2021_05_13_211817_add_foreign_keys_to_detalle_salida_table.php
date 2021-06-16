<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_salida', function (Blueprint $table) {
            $table->foreign('nro_docu', 'FK_detalle_salida_nota_salida')->references('nro_docu')->on('nota_salida')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_salida', function (Blueprint $table) {
            $table->dropForeign('FK_detalle_salida_nota_salida');
        });
    }
}
