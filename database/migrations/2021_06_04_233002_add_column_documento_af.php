<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDocumentoAf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('documento_af', function (Blueprint $table) {
            $table->integer('id_trabajador')->nullable()->after('id_responsable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('documento_af', function (Blueprint $table) {
            $table->dropColumn('id_trabajador');
        });
    }
}
