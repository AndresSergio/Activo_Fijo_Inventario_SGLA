<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 25);
            $table->string('nit',15)->unique('nit');
            $table->string('descripcion', 50);
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
        Schema::dropIfExists('empresa_af');
    }
}
