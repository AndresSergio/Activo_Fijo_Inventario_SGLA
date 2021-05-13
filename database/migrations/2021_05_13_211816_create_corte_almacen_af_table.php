<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorteAlmacenAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corte_almacen_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_corte_inv')->index('id_corte_inv');
            $table->char('codigo_item', 30);
            $table->char('serie', 30);
            $table->decimal('cantidad', 15);
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
        Schema::dropIfExists('corte_almacen_af');
    }
}
