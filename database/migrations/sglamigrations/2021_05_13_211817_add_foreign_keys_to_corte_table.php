<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCorteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corte', function (Blueprint $table) {
            $table->foreign('id_sucursal', 'FK_corte_sucursal')->references('id')->on('sucursal')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corte', function (Blueprint $table) {
            $table->dropForeign('FK_corte_sucursal');
        });
    }
}
