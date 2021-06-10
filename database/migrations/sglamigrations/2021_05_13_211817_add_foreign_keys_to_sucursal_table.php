<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sucursal', function (Blueprint $table) {
            $table->foreign('id_ciudad', 'FK_sucursal_Ciudad')->references('id')->on('ciudad')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_empresa', 'FK_sucursal_empresa')->references('id')->on('empresa')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sucursal', function (Blueprint $table) {
            $table->dropForeign('FK_sucursal_Ciudad');
            $table->dropForeign('FK_sucursal_empresa');
        });
    }
}
