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
        $collection         = collect([
            ['descripcion' => 'DE LA CORONA', 'valor_ponderado' => 0.65],
            ['descripcion' => 'DEL SEÑALAMIENTO', 'valor_ponderado' => 0.35],
        ]);

        $collection->each(function ($item) {

            factory(App\ElementoGeneral::class)->create([
                'descripcion'     => $item['descripcion'],
                'valor_ponderado' => $item['valor_ponderado'],
            ]);
        });
    }
}
