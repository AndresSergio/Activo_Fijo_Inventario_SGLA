<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoSalidaAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_salida_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('codigo', 15)->unique('codigo');
            $table->string('nombre', 25);
            $table->string('descripcion', 75);
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
        Schema::dropIfExists('tipo_salida_af');
    }
}
