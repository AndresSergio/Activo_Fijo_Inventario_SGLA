<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIngresoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingreso_af', function (Blueprint $table) {
            $table->foreign('id_tipo_ingr', 'ingreso_af_ibfk_1')->references('id')->on('tipo_ingreso_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_sucursal', 'ingreso_af_ibfk_2')->references('id')->on('sucursal_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_responsable', 'ingreso_af_ibfk_3')->references('id')->on('responsable_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingreso_af', function (Blueprint $table) {
            $table->dropForeign('ingreso_af_ibfk_1');
            $table->dropForeign('ingreso_af_ibfk_2');
            $table->dropForeign('ingreso_af_ibfk_3');
        });
    }
}
