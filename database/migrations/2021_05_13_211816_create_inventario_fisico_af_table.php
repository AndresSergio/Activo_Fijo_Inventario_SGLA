<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioFisicoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_fisico_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre_item', 50);
            $table->char('codigo_item', 30);
            $table->string('area', 25);
            $table->string('sector', 25);
            $table->char('serie', 25);
            $table->dateTime('fecha_reg');
            $table->string('responsable', 50);
            $table->string('usuario', 50);
            $table->decimal('alto')->nullable();
            $table->decimal('ancho')->nullable();
            $table->decimal('largo')->nullable();
            $table->string('color', 20);
            $table->string('marca', 25);
            $table->string('modelo', 25);
            $table->string('foto', 100);
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
        Schema::dropIfExists('inventario_fisico_af');
    }
}
