<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteSeccionesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('reporte_secciones', function (Blueprint $table) {
			// $table->increments('id');
			$table->integer('autopista_id');
			$table->integer('seccion_id');
			$table->string('seccion');
			$table->unsignedDecimal('calificacion_tramo', 3, 2);
			$table->uuid('uuid')->unique();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('reporte_secciones');
	}
}
