<?php

use App\ElementoGeneralCamino;
use Illuminate\Database\Seeder;

class ElementosGeneralCaminoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elementosGenerales = array('DE LA CORONA', 'DEL SEÑALAMIENTO');
        foreach ($elementosGenerales as &$elementoGeneral) {
            factory(App\ElementoGeneralCamino::class)->create([
                'descripcion' => $elementoGeneral,
            ]);
        }
    }
}
