<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotaIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nota_ingreso', function (Blueprint $table) {
            $table->foreign('movimiento', 'FK_nota_ingreso_tipo_movimiento')->references('codigo')->on('tipo_movimiento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nota_ingreso', function (Blueprint $table) {
            $table->dropForeign('FK_nota_ingreso_tipo_movimiento');
        });
    }
}
