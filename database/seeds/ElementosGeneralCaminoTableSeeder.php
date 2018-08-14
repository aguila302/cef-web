<?php

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
            factory(App\ElementoGeneral::class)->create([
                'descripcion' => $elementoGeneral,
            ]);
        }
    }
}
