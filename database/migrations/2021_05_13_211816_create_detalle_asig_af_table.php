<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleAsigAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_asig_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('observacion', 50);
            $table->integer('id_almacen_act')->index('id_almacen_act');
            $table->integer('id_documento')->index('id_documento');
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
        Schema::dropIfExists('detalle_asig_af');
    }
}
