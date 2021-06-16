<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flota', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('tipo_vehiculo', 30);
            $table->string('modelo', 10);
            $table->string('marca', 30)->nullable();
            $table->string('color', 25)->nullable();
            $table->string('placa', 15);
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
        Schema::dropIfExists('flota');
    }
}
