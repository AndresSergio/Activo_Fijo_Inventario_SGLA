<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleIngrAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingr_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_item')->index('id_item');
            $table->integer('id_ingreso')->index('id_ingreso');
            $table->string('det_descripcion', 75);
            $table->decimal('cantidad', 15);
            $table->smallInteger('estado')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingr_af');
    }
}
