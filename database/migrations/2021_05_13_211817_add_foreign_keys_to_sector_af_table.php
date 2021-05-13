<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSectorAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sector_af', function (Blueprint $table) {
            $table->foreign('id_area', 'sector_af_ibfk_1')->references('id')->on('area_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sector_af', function (Blueprint $table) {
            $table->dropForeign('sector_af_ibfk_1');
        });
    }
}
