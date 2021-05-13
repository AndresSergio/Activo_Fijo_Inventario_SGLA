<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoIngresoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_ingreso_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 25);
            $table->string('descripcion', 50);
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
        Schema::dropIfExists('tipo_ingreso_af');
    }
}
