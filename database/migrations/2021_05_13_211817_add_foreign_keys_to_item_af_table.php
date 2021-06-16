<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToItemAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_af', function (Blueprint $table) {
            $table->foreign('id_clasificacion', 'item_af_ibfk_1')->references('id')->on('calificacion_acti_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_modelo', 'item_af_ibfk_2')->references('id')->on('modelo_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_marca', 'item_af_ibfk_3')->references('id')->on('marca_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_af', function (Blueprint $table) {
            $table->dropForeign('item_af_ibfk_1');
            $table->dropForeign('item_af_ibfk_2');
            $table->dropForeign('item_af_ibfk_3');
        });
    }
}
