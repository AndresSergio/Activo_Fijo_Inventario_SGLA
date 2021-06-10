<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rack', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 10);
            $table->string('descripcion', 20);
            $table->integer('capacidad_max');
            $table->integer('cantidad_fila');
            $table->integer('cantidad_colu');
            $table->integer('id_bodega')->index('id_bodega');
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
        Schema::dropIfExists('rack');
    }
}
