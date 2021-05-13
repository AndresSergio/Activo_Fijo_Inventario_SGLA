<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleIngrAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_ingr_af', function (Blueprint $table) {
            $table->foreign('id_item', 'detalle_ingr_af_ibfk_1')->references('id')->on('item_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_ingreso', 'detalle_ingr_af_ibfk_2')->references('id')->on('ingreso_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_ingr_af', function (Blueprint $table) {
            $table->dropForeign('detalle_ingr_af_ibfk_1');
            $table->dropForeign('detalle_ingr_af_ibfk_2');
        });
    }
}
