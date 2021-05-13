<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('numero_doc', 25);
            $table->string('directorio', 75);
            $table->date('fecha_reg');
            $table->integer('id_tipo_ingr')->index('id_tipo_ingr');
            $table->integer('id_sucursal')->index('id_sucursal');
            $table->integer('id_responsable')->index('id_responsable');
            $table->smallInteger('estado')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso_af');
    }
}
