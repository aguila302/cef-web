<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedDecimal('cadenamiento_inicial_km', 3, 0);
            $table->unsignedDecimal('cadenamiento_inicial_m', 3, 0);
            $table->unsignedDecimal('cadenamiento_final_km', 3, 0);
            $table->unsignedDecimal('cadenamiento_final_m', 3, 0);

            $table->unsignedInteger('autopista_id')->nullable();

            $table->foreign('autopista_id')
                ->references('id')->on('autopistas')
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
        Schema::dropIfExists('tramos');
    }
}
