<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactoresElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factores_elementos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedDecimal('factor_elemento', 3, 1);

            $table->unsignedInteger('elemento_id')->nullable();

            $table->foreign('elemento_id')
                ->references('id')->on('elementos')
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
        Schema::dropIfExists('factores_elementos');
    }
}
