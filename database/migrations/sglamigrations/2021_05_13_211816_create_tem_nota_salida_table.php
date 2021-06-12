<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemNotaSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tem_nota_salida', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cod_cliente', 15);
            $table->string('cod_vendedor', 15);
            $table->string('tip_movimiento', 15);
            $table->string('nro_documento', 15);
            $table->string('codigo', 15);
            $table->string('lote', 20)->nullable();
            $table->date('fecha_venc')->nullable();
            $table->string('serie', 20)->nullable();
            $table->decimal('cantidad', 12);
            $table->string('ubicacion', 20)->nullable();
            $table->string('raz_social', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tem_nota_salida');
    }
}
