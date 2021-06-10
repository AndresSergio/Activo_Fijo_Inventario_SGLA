<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pc', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cuenta', 20);
            $table->string('contrasenia', 100);
            $table->string('nombre', 70);
            $table->string('documento', 15);
            $table->integer('tipo')->index('tipo');
            $table->integer('id_almacen');
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
        Schema::dropIfExists('user_pc');
    }
}
