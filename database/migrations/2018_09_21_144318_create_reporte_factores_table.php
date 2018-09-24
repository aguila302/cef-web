<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteFactoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_factores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reporte_conceptos_id');
            $table->unsignedDecimal('elemento_id');
            $table->string('elemento');
            $table->unsignedDecimal('factor_elemento', 3, 2);
            $table->unsignedDecimal('valor_particular', 3, 2);
            $table->unsignedDecimal('calificacion_particular', 3, 2);

            $table->foreign('reporte_conceptos_id')
                ->references('id')->on('reporte_conceptos')
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
        Schema::dropIfExists('reporte_factores');
    }
}
