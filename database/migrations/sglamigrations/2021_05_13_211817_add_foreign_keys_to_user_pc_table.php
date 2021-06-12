<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserPcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_pc', function (Blueprint $table) {
            $table->foreign('tipo', 'FK_user_pc_grupo')->references('id')->on('grupo')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_pc', function (Blueprint $table) {
            $table->dropForeign('FK_user_pc_grupo');
        });
    }
}
