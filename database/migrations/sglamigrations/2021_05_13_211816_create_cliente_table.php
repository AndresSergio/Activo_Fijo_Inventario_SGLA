<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 15)->unique('UQ_cliente_codigo');
            $table->string('ci_nit', 20)->nullable();
            $table->string('razon_social', 150);
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('direccion', 100)->nullable();
            $table->string('provincia', 70)->nullable();
            $table->string('departamento', 50)->nullable();
            $table->string('zona', 50)->nullable();
            $table->string('telefono', 15)->nullable();
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
        Schema::dropIfExists('cliente');
    }
}
