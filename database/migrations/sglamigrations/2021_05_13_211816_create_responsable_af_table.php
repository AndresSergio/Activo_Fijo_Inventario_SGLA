<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 20);
            $table->string('apellido', 20);
            $table->integer('ci')->unique('ci');
            $table->integer('telefono');
            $table->string('direccion', 50);
            $table->integer('tipo_resp')->index('tipo_resp');
            $table->integer('id_sector')->index('id_sector');
            $table->integer('id_turno')->index('id_turno');
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
        Schema::dropIfExists('responsable_af');
    }
}
