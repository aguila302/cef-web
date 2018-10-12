<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementosGeneralesCaminoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementos_generales_camino', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 50);
            $table->unsignedDecimal('valor_ponderado', 3, 2);
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
        Schema::dropIfExists('elementos_generales_camino');
    }
}
