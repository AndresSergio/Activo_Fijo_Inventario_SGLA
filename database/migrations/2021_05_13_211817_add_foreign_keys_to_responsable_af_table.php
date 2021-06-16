<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResponsableAfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responsable_af', function (Blueprint $table) {
            $table->foreign('tipo_resp', 'responsable_af_ibfk_1')->references('id')->on('tipo_resp_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_sector', 'responsable_af_ibfk_2')->references('id')->on('sector_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_turno', 'responsable_af_ibfk_3')->references('id')->on('turno_af')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsable_af', function (Blueprint $table) {
            $table->dropForeign('responsable_af_ibfk_1');
            $table->dropForeign('responsable_af_ibfk_2');
            $table->dropForeign('responsable_af_ibfk_3');
        });
    }
}
