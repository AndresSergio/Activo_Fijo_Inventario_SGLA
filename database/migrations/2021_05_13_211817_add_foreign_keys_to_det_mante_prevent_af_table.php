<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetMantePreventAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('det_mante_prevent_af', function (Blueprint $table) {
            $table->foreign('id_almacen', 'det_mante_prevent_af_ibfk_1')->references('id')->on('almacen_activo_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_mant_preventivo', 'det_mante_prevent_af_ibfk_2')->references('id')->on('mantenimiento_prev_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('det_mante_prevent_af', function (Blueprint $table) {
            $table->dropForeign('det_mante_prevent_af_ibfk_1');
            $table->dropForeign('det_mante_prevent_af_ibfk_2');
        });
    }
}
