<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubcategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcategoria', function (Blueprint $table) {
            $table->foreign('cod_categoria', 'FK_subcategoria_categoria')->references('codigo')->on('categoria')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subcategoria', function (Blueprint $table) {
            $table->dropForeign('FK_subcategoria_categoria');
        });
    }
}
