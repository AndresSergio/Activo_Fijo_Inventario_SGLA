<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSalidaAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salida_af', function (Blueprint $table) {
            $table->foreign('origen_suc', 'salida_af_ibfk_1')->references('id')->on('sucursal')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salida_af', function (Blueprint $table) {
            $table->dropForeign('salida_af_ibfk_1');
        });
    }
}
