<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGuiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guia', function (Blueprint $table) {
            $table->foreign('id_desp_pedi', 'FK_guia_despacho_pedi')->references('id')->on('despacho_pedi')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guia', function (Blueprint $table) {
            $table->dropForeign('FK_guia_despacho_pedi');
        });
    }
}
