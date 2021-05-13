<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventario2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario2', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('cod_item', 15);
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->decimal('cantidad', 15);
            $table->string('observacion', 20)->nullable();
            $table->string('cod_bodega', 10)->nullable();
            $table->integer('id_respaldo')->nullable();
            $table->integer('id_corte')->index('id_corte');
            $table->string('operador', 20);
            $table->smallInteger('estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventario2');
    }
}
