<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInventario2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventario2', function (Blueprint $table) {
            $table->foreign('id_corte', 'FK_inventario2_corte')->references('id')->on('corte')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventario2', function (Blueprint $table) {
            $table->dropForeign('FK_inventario2_corte');
        });
    }
}
