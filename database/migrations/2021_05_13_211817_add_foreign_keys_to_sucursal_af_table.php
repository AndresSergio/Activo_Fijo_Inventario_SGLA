<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSucursalAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sucursal_af', function (Blueprint $table) {
            $table->foreign('id_empresa', 'sucursal_af_ibfk_1')->references('id')->on('empresa_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_departamento', 'sucursal_af_ibfk_2')->references('id')->on('departamento_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sucursal_af', function (Blueprint $table) {
            $table->dropForeign('sucursal_af_ibfk_1');
            $table->dropForeign('sucursal_af_ibfk_2');
        });
    }
}
