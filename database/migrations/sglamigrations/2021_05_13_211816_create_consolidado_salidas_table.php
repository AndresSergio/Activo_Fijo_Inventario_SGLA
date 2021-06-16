<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolidadoSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolidado_salidas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cod_item', 15);
            $table->decimal('cantidad', 12);
            $table->integer('id_consolidado');
            $table->dateTime('fecha_regi');
            $table->smallInteger('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consolidado_salidas');
    }
}
