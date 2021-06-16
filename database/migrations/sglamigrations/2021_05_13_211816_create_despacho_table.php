<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespachoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despacho', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('fecha_desp');
            $table->smallInteger('tipo_dist');
            $table->string('descripcion', 50)->nullable();
            $table->integer('id_distribuidor')->index('id_distribuidor');
            $table->integer('id_flota')->index('id_flota');
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
        Schema::dropIfExists('despacho');
    }
}
