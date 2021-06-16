<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->foreign('id_funciones', 'FK_permisos_funciones')->references('id')->on('funciones')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_tipo', 'FK_permisos_grupo')->references('id')->on('grupo')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->dropForeign('FK_permisos_funciones');
            $table->dropForeign('FK_permisos_grupo');
        });
    }
}
