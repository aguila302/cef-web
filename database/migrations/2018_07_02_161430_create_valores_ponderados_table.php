<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValoresPonderadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valores_ponderados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedDecimal('valor_ponderado', 3, 2);

            $table->unsignedInteger('elemento_general_camino_id')->nullable();

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
        Schema::dropIfExists('valores_ponderados');
    }
}
