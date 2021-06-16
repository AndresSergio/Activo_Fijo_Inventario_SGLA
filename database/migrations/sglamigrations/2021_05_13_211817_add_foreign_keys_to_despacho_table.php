<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDespachoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('despacho', function (Blueprint $table) {
            $table->foreign('id_distribuidor', 'FK_despacho_distribuidor')->references('id')->on('distribuidor')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_flota', 'FK_despacho_flota')->references('id')->on('flota')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('despacho', function (Blueprint $table) {
            $table->dropForeign('FK_despacho_distribuidor');
            $table->dropForeign('FK_despacho_flota');
        });
    }
}
