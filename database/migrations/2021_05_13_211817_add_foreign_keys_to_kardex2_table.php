<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKardex2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kardex2', function (Blueprint $table) {
            $table->foreign('id_corte', 'FK_kardex2_corte')->references('id')->on('corte')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cod_item', 'FK_kardex2_item')->references('codigo')->on('item')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kardex2', function (Blueprint $table) {
            $table->dropForeign('FK_kardex2_corte');
            $table->dropForeign('FK_kardex2_item');
        });
    }
}
