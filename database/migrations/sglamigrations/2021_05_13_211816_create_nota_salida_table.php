<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_salida', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nro_docu', 15)->unique('UQ_nota_salida_nro_docu');
            $table->dateTime('fecha_emis');
            $table->string('prioridad', 10);
            $table->smallInteger('programacion');
            $table->string('cod_cliente', 15);
            $table->string('cod_movimiento', 10)->nullable();
            $table->integer('id_consolidado')->nullable();
            $table->string('cod_vendedor', 15)->nullable();
            $table->string('usuario', 20)->nullable();
            $table->integer('id_sucursal')->nullable();
            $table->smallInteger('estado');
            $table->string('raz_social', 150)->nullable();
            $table->integer('id_destino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_salida');
    }
}
