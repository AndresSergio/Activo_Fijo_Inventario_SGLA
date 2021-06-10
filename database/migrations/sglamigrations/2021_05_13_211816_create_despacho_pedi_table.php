<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespachoPediTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despacho_pedi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_despacho')->index('id_despacho');
            $table->string('nro_docu', 15)->index('nro_docu');
            $table->smallInteger('estado');
            $table->integer('id_packing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despacho_pedi');
    }
}
