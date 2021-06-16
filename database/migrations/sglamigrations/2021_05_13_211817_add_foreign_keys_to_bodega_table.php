<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBodegaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bodega', function (Blueprint $table) {
            $table->foreign('id_sucursal', 'FK_bodega_sucursal')->references('id')->on('sucursal')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bodega', function (Blueprint $table) {
            $table->dropForeign('FK_bodega_sucursal');
        });
    }
}
