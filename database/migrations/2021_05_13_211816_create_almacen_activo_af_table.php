<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenActivoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen_activo_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('codigo_item', 15);
            $table->char('serie', 25);
            $table->smallInteger('observacion');
            $table->string('foto', 150);
            $table->integer('id_det_ingreso')->index('id_det_ingreso');
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
        Schema::dropIfExists('almacen_activo_af');
    }
}
