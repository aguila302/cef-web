<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 150);
            $table->unsignedDecimal('factor_elemento', 3, 2);
            $table->unsignedDecimal('factor_particular', 3, 1);
            $table->unsignedInteger('valor_ponderado_id')->nullable();

            $table->unsignedInteger('elemento_general_camino_id')->nullable();

            $table->foreign('valor_ponderado_id')
                ->references('id')->on('valores_ponderados')
                ->onDelete('cascade');

            $table->foreign('elemento_general_camino_id')
                ->references('id')->on('elementos_generales_camino')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementos');
    }
}
