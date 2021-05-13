<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKardex2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kardex2', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cod_item', 15)->index('cod_item');
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->decimal('cantidad', 15)->nullable();
            $table->string('observacion', 20)->nullable();
            $table->string('cod_bodega', 10)->nullable();
            $table->integer('id_respaldo')->nullable();
            $table->integer('id_corte')->index('id_corte');
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
        Schema::dropIfExists('kardex2');
    }
}
