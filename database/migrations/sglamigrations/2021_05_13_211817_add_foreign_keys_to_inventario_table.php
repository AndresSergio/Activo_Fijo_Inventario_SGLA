<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventario', function (Blueprint $table) {
            $table->foreign('id_corte', 'FK_inventario_corte')->references('id')->on('corte')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventario', function (Blueprint $table) {
            $table->dropForeign('FK_inventario_corte');
        });
    }
}
