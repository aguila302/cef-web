<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteConceptosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('reporte_conceptos', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('reporte_secciones_id');
			$table->string('concepto_general');
			$table->unsignedDecimal('valor_ponderado', 3, 2);

			$table->foreign('reporte_secciones_id')
				->references('id')->on('reporte_secciones')
				->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('reporte_conceptos');
	}
}
