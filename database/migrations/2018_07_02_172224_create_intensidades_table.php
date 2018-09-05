<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntensidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intensidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 150);
            $table->unsignedInteger('elemento_id')->nullable();
            $table->unsignedInteger('defecto_id')->nullable();

            $table->foreign('defecto_id')
                ->references('id')->on('defectos')
                ->onDelete('cascade');

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
        Schema::dropIfExists('intensidades');
    }
}
