<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursal', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 10);
            $table->string('descripcion', 25);
            $table->string('ubicacion', 30)->nullable();
            $table->string('direccion', 50)->nullable();
            $table->smallInteger('inventario');
            $table->integer('id_ciudad')->index('id_ciudad');
            $table->integer('id_empresa')->index('id_empresa');
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
        Schema::dropIfExists('sucursal');
    }
}
