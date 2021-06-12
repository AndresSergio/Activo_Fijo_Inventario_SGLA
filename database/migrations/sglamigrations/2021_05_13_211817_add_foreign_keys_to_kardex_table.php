<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kardex', function (Blueprint $table) {
            $table->foreign('id_corte', 'FK_kardex_corte')->references('id')->on('corte')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('cod_item', 'FK_kardex_item')->references('codigo')->on('item')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kardex', function (Blueprint $table) {
            $table->dropForeign('FK_kardex_corte');
            $table->dropForeign('FK_kardex_item');
        });
    }
}
