<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rack', function (Blueprint $table) {
            $table->foreign('id_bodega', 'FK_rack_bodega')->references('id')->on('bodega')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rack', function (Blueprint $table) {
            $table->dropForeign('FK_rack_bodega');
        });
    }
}
