<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('origen_suc')->index('origen_suc');
            $table->integer('destino_suc')->nullable();
            $table->string('descipcion', 75);
            $table->integer('id_proveedor')->nullable();
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
        Schema::dropIfExists('salida_af');
    }
}
