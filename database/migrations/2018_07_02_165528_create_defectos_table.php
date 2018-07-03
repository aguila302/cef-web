<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 150);

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
        Schema::dropIfExists('defectos');
    }
}
