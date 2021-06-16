<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('codigo', 15)->unique('codigo');
            $table->string('nombre', 25);
            $table->decimal('alto', 8, 0)->nullable();
            $table->decimal('ancho', 8, 0)->nullable();
            $table->decimal('largo', 8, 0)->nullable();
            $table->string('color', 15);
            $table->string('lote', 25)->nullable();
            $table->integer('tiempo_vida')->nullable();
            $table->integer('control_mante')->nullable();
            $table->integer('id_clasificacion')->index('id_clasificacion');
            $table->integer('id_modelo')->index('id_modelo');
            $table->integer('id_marca')->index('id_marca');
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
        Schema::dropIfExists('item_af');
    }
}
