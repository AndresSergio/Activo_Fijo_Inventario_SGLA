<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 25);
            $table->string('razon_social', 30);
            $table->integer('telefono');
            $table->string('direccion', 150);
            $table->string('correo', 25)->nullable();
            $table->integer('nit')->unique('nit');
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
        Schema::dropIfExists('proveedor_af');
    }
}
