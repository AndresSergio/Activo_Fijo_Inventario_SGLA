<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_af', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descripcion', 75);
            $table->string('directorio', 75);
            $table->date('fecha_creacion');
            $table->date('fecha_entrega')->nullable();
            $table->integer('id_responsable')->index('id_responsable');
            $table->integer('id_tipo_doc')->index('id_tipo_doc');
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
        Schema::dropIfExists('documento_af');
    }
}
