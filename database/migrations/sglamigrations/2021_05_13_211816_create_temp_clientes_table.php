<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_clientes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 15);
            $table->string('ci_nit', 20);
            $table->string('raz_social', 150);
            $table->string('nombre', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_clientes');
    }
}
