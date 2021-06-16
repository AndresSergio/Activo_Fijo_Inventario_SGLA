<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corte', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('nro');
            $table->date('fec_inicio')->nullable();
            $table->date('fec_final')->nullable();
            $table->dateTime('fec_creacion')->nullable();
            $table->dateTime('fec_conciliacion')->nullable();
            $table->string('encargado', 50)->nullable();
            $table->smallInteger('cor_sgla');
            $table->smallInteger('cor_kardex');
            $table->smallInteger('tip_inventario');
            $table->integer('id_sucursal')->index('id_sucursal');
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
        Schema::dropIfExists('corte');
    }
}
