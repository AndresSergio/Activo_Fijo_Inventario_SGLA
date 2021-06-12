<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 15)->unique('UQ_item_codigo');
            $table->string('descripcion', 150);
            $table->string('cod_fabrica', 50)->nullable();
            $table->string('unidad_med', 10)->nullable();
            $table->decimal('precio', 10)->nullable();
            $table->integer('minimo');
            $table->integer('maximo');
            $table->integer('vida_util');
            $table->integer('tiempo_bloq');
            $table->integer('tiempo_aler');
            $table->integer('rotacion_volu');
            $table->integer('rotacion_venc');
            $table->string('cod_sbcategoria', 15)->index('cod_sbcategoria');
            $table->string('id_rotacion', 2);
            $table->integer('id_proveedor');
            $table->integer('tipo_item');
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
        Schema::dropIfExists('item');
    }
}
