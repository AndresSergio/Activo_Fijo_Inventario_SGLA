<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_movimiento', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 10)->unique('UQ_tipo_movimiento_codigo');
            $table->string('descripcion', 25);
            $table->smallInteger('tipo');
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
        Schema::dropIfExists('tipo_movimiento');
    }
}
