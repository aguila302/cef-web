<?php

use Illuminate\Database\Seeder;

class RangosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            ['rango_inicial' => 4.6, 'rango_final' => 5, 'defecto_id' => 1, 'intensidad_id' => 4],
            ['rango_inicial' => 4.1, 'rango_final' => 4.5, 'defecto_id' => 1, 'intensidad_id' => 5],
            ['rango_inicial' => 3.6, 'rango_final' => 4.0, 'defecto_id' => 1, 'intensidad_id' => 1],
            ['rango_inicial' => 3.1, 'rango_final' => 3.5, 'defecto_id' => 1, 'intensidad_id' => 2],
            ['rango_inicial' => 1, 'rango_final' => 3.0, 'defecto_id' => 1, 'intensidad_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 2, 'intensidad_id' => 4],
            ['rango_inicial' => 0.1, 'rango_final' => 0.3, 'defecto_id' => 2, 'intensidad_id' => 5],
            ['rango_inicial' => 0.1, 'rango_final' => 0.3, 'defecto_id' => 2, 'intensidad_id' => 1],
            ['rango_inicial' => 0.3, 'rango_final' => 0.6, 'defecto_id' => 2, 'intensidad_id' => 2],
            ['rango_inicial' => 0.6, 'rango_final' => 1, 'defecto_id' => 2, 'intensidad_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 3, 'intensidad_id' => 4],
            ['rango_inicial' => 0.1, 'rango_final' => 0.5, 'defecto_id' => 3, 'intensidad_id' => 5],
            ['rango_inicial' => 0.3, 'rango_final' => 0.6, 'defecto_id' => 3, 'intensidad_id' => 1],
            ['rango_inicial' => 0.6, 'rango_final' => 1, 'defecto_id' => 3, 'intensidad_id' => 2],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 3, 'intensidad_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 4, 'intensidad_id' => 4],
            ['rango_inicial' => 0.2, 'rango_final' => 0.5, 'defecto_id' => 4, 'intensidad_id' => 5],
            ['rango_inicial' => 0.3, 'rango_final' => 0.5, 'defecto_id' => 4, 'intensidad_id' => 1],
            ['rango_inicial' => 0.5, 'rango_final' => 1, 'defecto_id' => 4, 'intensidad_id' => 2],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 4, 'intensidad_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 5, 'intensidad_id' => 4],
            ['rango_inicial' => 0.2, 'rango_final' => 0.8, 'defecto_id' => 5, 'intensidad_id' => 5],
            ['rango_inicial' => 0.5, 'rango_final' => 0.8, 'defecto_id' => 5, 'intensidad_id' => 1],
            ['rango_inicial' => 0.8, 'rango_final' => 1.5, 'defecto_id' => 5, 'intensidad_id' => 2],
            ['rango_inicial' => 1.5, 'rango_final' => 2, 'defecto_id' => 5, 'intensidad_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 6, 'intensidad_id' => 4],
            ['rango_inicial' => 0.0, 'rango_final' => 0.3, 'defecto_id' => 6, 'intensidad_id' => 5],
            ['rango_inicial' => 0.1, 'rango_final' => 0.3, 'defecto_id' => 6, 'intensidad_id' => 1],
            ['rango_inicial' => 0.3, 'rango_final' => 1, 'defecto_id' => 6, 'intensidad_id' => 2],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 6, 'intensidad_id' => 3],

            ['rango_inicial' => 5, 'rango_final' => 5, 'defecto_id' => 7, 'intensidad_id' => 6],
            ['rango_inicial' => 3, 'rango_final' => 5, 'defecto_id' => 7, 'intensidad_id' => 7],
            ['rango_inicial' => 1, 'rango_final' => 3, 'defecto_id' => 7, 'intensidad_id' => 8],
            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 7, 'intensidad_id' => 9],
            ['rango_inicial' => 1, 'rango_final' => 1, 'defecto_id' => 7, 'intensidad_id' => 10],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 8, 'intensidad_id' => 6],
            ['rango_inicial' => 0, 'rango_final' => 1, 'defecto_id' => 8, 'intensidad_id' => 7],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 8, 'intensidad_id' => 8],
            ['rango_inicial' => 0.5, 'rango_final' => 0.5, 'defecto_id' => 8, 'intensidad_id' => 9],
            ['rango_inicial' => 1, 'rango_final' => 1, 'defecto_id' => 8, 'intensidad_id' => 10],

            ['rango_inicial' => 0.1, 'rango_final' => 0.1, 'defecto_id' => 9, 'intensidad_id' => 9],
            ['rango_inicial' => 0.5, 'rango_final' => 0.5, 'defecto_id' => 9, 'intensidad_id' => 10],

            ['rango_inicial' => 0.5, 'rango_final' => 0.5, 'defecto_id' => 10, 'intensidad_id' => 9],
            ['rango_inicial' => 2.0, 'rango_final' => 2.0, 'defecto_id' => 10, 'intensidad_id' => 10],

            ['rango_inicial' => 5, 'rango_final' => 5, 'defecto_id' => 11, 'intensidad_id' => 11],
            ['rango_inicial' => 3.5, 'rango_final' => 5, 'defecto_id' => 11, 'intensidad_id' => 12],
            ['rango_inicial' => 2.5, 'rango_final' => 3.5, 'defecto_id' => 11, 'intensidad_id' => 13],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 12, 'intensidad_id' => 11],
            ['rango_inicial' => 0.5, 'rango_final' => 0.5, 'defecto_id' => 12, 'intensidad_id' => 12],
            ['rango_inicial' => 1, 'rango_final' => 1, 'defecto_id' => 12, 'intensidad_id' => 13],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 13, 'intensidad_id' => 11],
            ['rango_inicial' => 1, 'rango_final' => 1, 'defecto_id' => 13, 'intensidad_id' => 14],
            ['rango_inicial' => 2, 'rango_final' => 2, 'defecto_id' => 13, 'intensidad_id' => 15],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 14, 'intensidad_id' => 11],
            ['rango_inicial' => 0.0, 'rango_final' => 1.0, 'defecto_id' => 14, 'intensidad_id' => 14],
            ['rango_inicial' => 1.0, 'rango_final' => 2.0, 'defecto_id' => 14, 'intensidad_id' => 15],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 15, 'intensidad_id' => 11],
            ['rango_inicial' => 0, 'rango_final' => 1, 'defecto_id' => 15, 'intensidad_id' => 14],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 15, 'intensidad_id' => 15],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 22, 'intensidad_id' => 11],
            ['rango_inicial' => 0, 'rango_final' => 1, 'defecto_id' => 22, 'intensidad_id' => 14],
            ['rango_inicial' => 1, 'rango_final' => 2, 'defecto_id' => 22, 'intensidad_id' => 15],

            ['rango_inicial' => 5, 'rango_final' => 5, 'defecto_id' => 16, 'intensidad_id' => 16],
            ['rango_inicial' => 3, 'rango_final' => 5, 'defecto_id' => 16, 'intensidad_id' => 17],
            ['rango_inicial' => 1, 'rango_final' => 3, 'defecto_id' => 16, 'intensidad_id' => 18],

            ['rango_inicial' => 1, 'rango_final' => 2, 'defecto_id' => 17, 'intensidad_id' => 17],
            ['rango_inicial' => 2, 'rango_final' => 3, 'defecto_id' => 17, 'intensidad_id' => 18],

            ['rango_inicial' => 0.3, 'rango_final' => 0.5, 'defecto_id' => 18, 'intensidad_id' => 17],
            ['rango_inicial' => 0.5, 'rango_final' => 1, 'defecto_id' => 18, 'intensidad_id' => 18],

            ['rango_inicial' => 5, 'rango_final' => 5, 'defecto_id' => 19, 'intensidad_id' => 19],
            ['rango_inicial' => 4, 'rango_final' => 5, 'defecto_id' => 19, 'intensidad_id' => 20],
            ['rango_inicial' => 2, 'rango_final' => 4, 'defecto_id' => 19, 'intensidad_id' => 21],

            ['rango_inicial' => 0.5, 'rango_final' => 1, 'defecto_id' => 20, 'intensidad_id' => 20],
            ['rango_inicial' => 1, 'rango_final' => 2, 'defecto_id' => 20, 'intensidad_id' => 21],

            ['rango_inicial' => 0.2, 'rango_final' => 0.5, 'defecto_id' => 21, 'intensidad_id' => 20],
            ['rango_inicial' => 0.5, 'rango_final' => 1, 'defecto_id' => 21, 'intensidad_id' => 21],

        ]);

        $collection->each(function ($item) {

            factory(App\Rango::class)->create([
                'rango_inicial' => $item['rango_inicial'],
                'rango_final'   => $item['rango_final'],
                'defecto_id'    => $item['defecto_id'],
                'intensidad_id' => $item['intensidad_id'],
            ]);
        });
    }
}
