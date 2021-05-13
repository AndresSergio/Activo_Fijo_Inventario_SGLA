<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocumentoAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documento_af', function (Blueprint $table) {
            $table->foreign('id_responsable', 'documento_af_ibfk_1')->references('id')->on('responsable_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_tipo_doc', 'documento_af_ibfk_2')->references('id')->on('tipo_documento_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documento_af', function (Blueprint $table) {
            $table->dropForeign('documento_af_ibfk_1');
            $table->dropForeign('documento_af_ibfk_2');
        });
    }
}
