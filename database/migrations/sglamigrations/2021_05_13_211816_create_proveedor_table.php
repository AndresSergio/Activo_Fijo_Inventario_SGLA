<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nit', 15);
            $table->string('razon_social', 70);
            $table->string('email', 30)->nullable();
            $table->string('pais', 10)->nullable();
            $table->string('descripcion', 25)->nullable();
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
        Schema::dropIfExists('proveedor');
    }
}
