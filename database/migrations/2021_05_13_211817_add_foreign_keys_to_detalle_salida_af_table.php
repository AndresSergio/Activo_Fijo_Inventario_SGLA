<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleSalidaAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_salida_af', function (Blueprint $table) {
            $table->foreign('id_salida', 'detalle_salida_af_ibfk_1')->references('id')->on('salida_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_almacen', 'detalle_salida_af_ibfk_2')->references('id')->on('almacen_activo_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_salida_af', function (Blueprint $table) {
            $table->dropForeign('detalle_salida_af_ibfk_1');
            $table->dropForeign('detalle_salida_af_ibfk_2');
        });
    }
}
