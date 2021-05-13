<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCorteAlmacenAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corte_almacen_af', function (Blueprint $table) {
            $table->foreign('id_corte_inv', 'corte_almacen_af_ibfk_1')->references('id')->on('corte_inventario_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corte_almacen_af', function (Blueprint $table) {
            $table->dropForeign('corte_almacen_af_ibfk_1');
        });
    }
}
