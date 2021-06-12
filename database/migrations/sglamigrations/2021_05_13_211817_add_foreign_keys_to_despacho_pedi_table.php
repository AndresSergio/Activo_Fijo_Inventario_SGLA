<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDespachoPediTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('despacho_pedi', function (Blueprint $table) {
            $table->foreign('id_despacho', 'FK_despacho_pedi_despacho')->references('id')->on('despacho')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('nro_docu', 'FK_despacho_pedi_nota_salida')->references('nro_docu')->on('nota_salida')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('despacho_pedi', function (Blueprint $table) {
            $table->dropForeign('FK_despacho_pedi_despacho');
            $table->dropForeign('FK_despacho_pedi_nota_salida');
        });
    }
}
