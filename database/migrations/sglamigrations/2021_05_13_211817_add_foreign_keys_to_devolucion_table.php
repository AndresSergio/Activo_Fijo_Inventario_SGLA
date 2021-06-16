<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDevolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devolucion', function (Blueprint $table) {
            $table->foreign('nro_ingreso', 'FK_devolucion_nota_ingreso')->references('nro_doc')->on('nota_ingreso')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devolucion', function (Blueprint $table) {
            $table->dropForeign('FK_devolucion_nota_ingreso');
        });
    }
}
