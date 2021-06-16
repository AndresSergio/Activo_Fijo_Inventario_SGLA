<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorteInventarioAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corte_inventario_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('numero');
            $table->integer('departamento');
            $table->integer('empresa');
            $table->integer('sucursal');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->smallInteger('estado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corte_inventario_af');
    }
}
