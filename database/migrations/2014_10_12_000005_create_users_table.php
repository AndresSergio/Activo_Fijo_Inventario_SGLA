<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('ci')->unique();
            $table->string('telefono');
            $table->string('direccion')->nullable();
            $table->integer('tipo_resp')->index('tipo_resp');
            $table->integer('id_sector')->index('id_sector');
            $table->integer('id_turno')->index('id_turno');
            $table->integer('estado')->index('estado');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('id_sector')->references('id')->on('sector_af');
            $table->foreign('id_turno')->references('id')->on('turno_af');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
