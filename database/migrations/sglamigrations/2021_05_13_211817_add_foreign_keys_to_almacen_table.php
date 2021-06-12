<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('almacen', function (Blueprint $table) {
            $table->foreign('cod_ubicacion', 'FK_almacen_ubicacion')->references('codigo')->on('ubicacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('almacen', function (Blueprint $table) {
            $table->dropForeign('FK_almacen_ubicacion');
        });
    }
}
