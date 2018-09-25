<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('calificaciones', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('autopista_id');
			$table->unsignedInteger('cuerpo_id');
			$table->unsignedInteger('seccion_id');
			$table->unsignedInteger('elemento_id');
			$table->unsignedInteger('defecto_id');
			$table->unsignedInteger('intensidad_id');
			$table->unsignedInteger('calificacion');
			$table->uuid('uuid')->unique();

			$table->foreign('autopista_id')
				->references('id')->on('autopistas')
				->onDelete('cascade');

			$table->foreign('cuerpo_id')
				->references('id')->on('cuerpos')
				->onDelete('cascade');

			$table->foreign('seccion_id')
				->references('id')->on('secciones')
				->onDelete('cascade');

			$table->foreign('elemento_id')
				->references('id')->on('elementos')
				->onDelete('cascade');

			$table->foreign('defecto_id')
				->references('id')->on('defectos')
				->onDelete('cascade');

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
	public function down() {
		Schema::dropIfExists('calificaciones');
	}
}
