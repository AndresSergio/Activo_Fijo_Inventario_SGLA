<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionActiAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_acti_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('codigo', 15)->unique('codigo');
            $table->string('nombre', 25);
            $table->integer('tiempo_vida')->nullable();
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
        Schema::dropIfExists('calificacion_acti_af');
    }
}
