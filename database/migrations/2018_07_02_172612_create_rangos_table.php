<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('rango_inicial', 2, 1)->nullable();
            $table->decimal('rango_final', 2, 1)->nullable();

            $table->unsignedInteger('defecto_id')->nullable();

            $table->foreign('defecto_id')
                ->references('id')->on('defectos')
                ->onDelete('cascade');

            $table->unsignedInteger('intensidad_id')->nullable();

            $table->foreign('intensidad_id')
                ->references('id')->on('intensidades')
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
        Schema::dropIfExists('rangos');
    }
}
