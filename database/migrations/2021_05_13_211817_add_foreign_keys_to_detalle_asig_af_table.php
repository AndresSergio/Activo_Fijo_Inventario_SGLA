<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleAsigAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_asig_af', function (Blueprint $table) {
            $table->foreign('id_almacen_act', 'detalle_asig_af_ibfk_1')->references('id')->on('almacen_activo_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_documento', 'detalle_asig_af_ibfk_2')->references('id')->on('documento_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_asig_af', function (Blueprint $table) {
            $table->dropForeign('detalle_asig_af_ibfk_1');
            $table->dropForeign('detalle_asig_af_ibfk_2');
        });
    }
}
