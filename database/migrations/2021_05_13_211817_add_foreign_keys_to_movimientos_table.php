<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->foreign('id_almacen', 'FK_movimientos_almacen')->references('id')->on('almacen')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->dropForeign('FK_movimientos_almacen');
        });
    }
}
