<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperadorMovilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operador_movil', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cuenta', 20);
            $table->string('contrasenia', 100);
            $table->string('nombre', 70);
            $table->string('documento', 15);
            $table->integer('id_grupo');
            $table->smallInteger('estado');
            $table->integer('idalmacen');
            $table->integer('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operador_movil');
    }
}
