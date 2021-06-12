<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCorteSglaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corte_sgla', function (Blueprint $table) {
            $table->foreign('id_corte', 'FK_corte_sgla_corte')->references('id')->on('corte')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corte_sgla', function (Blueprint $table) {
            $table->dropForeign('FK_corte_sgla_corte');
        });
    }
}
