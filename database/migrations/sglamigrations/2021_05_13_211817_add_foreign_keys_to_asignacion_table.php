<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignacion', function (Blueprint $table) {
            $table->foreign('id_corte', 'FK_asignacion_corte')->references('id')->on('corte')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_usuario', 'FK_asignacion_operador_movil')->references('id')->on('operador_movil')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignacion', function (Blueprint $table) {
            $table->dropForeign('FK_asignacion_corte');
            $table->dropForeign('FK_asignacion_operador_movil');
        });
    }
}
