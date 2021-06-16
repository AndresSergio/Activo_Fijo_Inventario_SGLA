<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAlmacenActivoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('almacen_activo_af', function (Blueprint $table) {
            $table->foreign('id_det_ingreso', 'almacen_activo_af_ibfk_1')->references('id')->on('detalle_ingr_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('almacen_activo_af', function (Blueprint $table) {
            $table->dropForeign('almacen_activo_af_ibfk_1');
        });
    }
}
