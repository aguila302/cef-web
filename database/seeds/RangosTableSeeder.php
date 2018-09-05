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
            ['rango_inicial' => 4.6, 'rango_final' => 5, 'defecto_id' => 1, 'intensidad_id' => 4, 'elemento_id' => 1],
            ['rango_inicial' => 4.1, 'rango_final' => 4.5, 'defecto_id' => 1, 'intensidad_id' => 5, 'elemento_id' => 1],
            ['rango_inicial' => 3.6, 'rango_final' => 4.0, 'defecto_id' => 1, 'intensidad_id' => 1, 'elemento_id' => 1],
            ['rango_inicial' => 3.1, 'rango_final' => 3.5, 'defecto_id' => 1, 'intensidad_id' => 2, 'elemento_id' => 1],
            ['rango_inicial' => 1, 'rango_final' => 3.0, 'defecto_id' => 1, 'intensidad_id' => 3, 'elemento_id' => 1],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 2, 'intensidad_id' => 6, 'elemento_id' => 1],
            ['rango_inicial' => 0.1, 'rango_final' => 0.3, 'defecto_id' => 2, 'intensidad_id' => 7, 'elemento_id' => 1],
            ['rango_inicial' => 0.1, 'rango_final' => 0.3, 'defecto_id' => 2, 'intensidad_id' => 8, 'elemento_id' => 1],
            ['rango_inicial' => 0.3, 'rango_final' => 0.6, 'defecto_id' => 2, 'intensidad_id' => 9, 'elemento_id' => 1],
            ['rango_inicial' => 0.6, 'rango_final' => 1, 'defecto_id' => 2, 'intensidad_id' => 10, 'elemento_id' => 1],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 3, 'intensidad_id' => 11, 'elemento_id' => 1],
            ['rango_inicial' => 0.1, 'rango_final' => 0.5, 'defecto_id' => 3, 'intensidad_id' => 12, 'elemento_id' => 1],
            ['rango_inicial' => 0.3, 'rango_final' => 0.6, 'defecto_id' => 3, 'intensidad_id' => 13, 'elemento_id' => 1],
            ['rango_inicial' => 0.6, 'rango_final' => 1, 'defecto_id' => 3, 'intensidad_id' => 14, 'elemento_id' => 1],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 3, 'intensidad_id' => 15, 'elemento_id' => 1],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 4, 'intensidad_id' => 16, 'elemento_id' => 1],
            ['rango_inicial' => 0.2, 'rango_final' => 0.5, 'defecto_id' => 4, 'intensidad_id' => 17, 'elemento_id' => 1],
            ['rango_inicial' => 0.3, 'rango_final' => 0.5, 'defecto_id' => 4, 'intensidad_id' => 18, 'elemento_id' => 1],
            ['rango_inicial' => 0.5, 'rango_final' => 1, 'defecto_id' => 4, 'intensidad_id' => 19, 'elemento_id' => 1],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 4, 'intensidad_id' => 20, 'elemento_id' => 1],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 5, 'intensidad_id' => 21, 'elemento_id' => 1],
            ['rango_inicial' => 0.2, 'rango_final' => 0.8, 'defecto_id' => 5, 'intensidad_id' => 22, 'elemento_id' => 1],
            ['rango_inicial' => 0.5, 'rango_final' => 0.8, 'defecto_id' => 5, 'intensidad_id' => 23, 'elemento_id' => 1],
            ['rango_inicial' => 0.8, 'rango_final' => 1.5, 'defecto_id' => 5, 'intensidad_id' => 24, 'elemento_id' => 1],
            ['rango_inicial' => 1.5, 'rango_final' => 2, 'defecto_id' => 5, 'intensidad_id' => 25, 'elemento_id' => 1],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 6, 'intensidad_id' => 26, 'elemento_id' => 1],
            ['rango_inicial' => 0.0, 'rango_final' => 0.3, 'defecto_id' => 6, 'intensidad_id' => 27, 'elemento_id' => 1],
            ['rango_inicial' => 0.1, 'rango_final' => 0.3, 'defecto_id' => 6, 'intensidad_id' => 28, 'elemento_id' => 1],
            ['rango_inicial' => 0.3, 'rango_final' => 1, 'defecto_id' => 6, 'intensidad_id' => 29, 'elemento_id' => 1],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 6, 'intensidad_id' => 30, 'elemento_id' => 1],

            ['rango_inicial' => 5, 'rango_final' => 5, 'defecto_id' => 7, 'intensidad_id' => 31, 'elemento_id' => 2],
            ['rango_inicial' => 3, 'rango_final' => 5, 'defecto_id' => 7, 'intensidad_id' => 32, 'elemento_id' => 2],
            ['rango_inicial' => 1, 'rango_final' => 3, 'defecto_id' => 7, 'intensidad_id' => 33, 'elemento_id' => 2],
            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 7, 'intensidad_id' => 34, 'elemento_id' => 2],
            ['rango_inicial' => 1, 'rango_final' => 1, 'defecto_id' => 7, 'intensidad_id' => 35, 'elemento_id' => 2],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 8, 'intensidad_id' => 36, 'elemento_id' => 2],
            ['rango_inicial' => 0, 'rango_final' => 1, 'defecto_id' => 8, 'intensidad_id' => 37, 'elemento_id' => 2],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 8, 'intensidad_id' => 38, 'elemento_id' => 2],
            ['rango_inicial' => 0.5, 'rango_final' => 0.5, 'defecto_id' => 8, 'intensidad_id' => 39, 'elemento_id' => 2],
            ['rango_inicial' => 1, 'rango_final' => 1, 'defecto_id' => 8, 'intensidad_id' => 40, 'elemento_id' => 2],

            ['rango_inicial' => 0.1, 'rango_final' => 0.1, 'defecto_id' => 9, 'intensidad_id' => 41, 'elemento_id' => 2],
            ['rango_inicial' => 0.5, 'rango_final' => 0.5, 'defecto_id' => 9, 'intensidad_id' => 42, 'elemento_id' => 2],

            ['rango_inicial' => 0.5, 'rango_final' => 0.5, 'defecto_id' => 10, 'intensidad_id' => 43, 'elemento_id' => 2],
            ['rango_inicial' => 2.0, 'rango_final' => 2.0, 'defecto_id' => 10, 'intensidad_id' => 44, 'elemento_id' => 2],

            ['rango_inicial' => 5, 'rango_final' => 5, 'defecto_id' => 11, 'intensidad_id' => 45, 'elemento_id' => 3],
            ['rango_inicial' => 3.5, 'rango_final' => 5, 'defecto_id' => 11, 'intensidad_id' => 46, 'elemento_id' => 3],
            ['rango_inicial' => 2.5, 'rango_final' => 3.5, 'defecto_id' => 11, 'intensidad_id' => 47, 'elemento_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 12, 'intensidad_id' => 48, 'elemento_id' => 3],
            ['rango_inicial' => 0.5, 'rango_final' => 0.5, 'defecto_id' => 12, 'intensidad_id' => 49, 'elemento_id' => 3],
            ['rango_inicial' => 1, 'rango_final' => 1, 'defecto_id' => 12, 'intensidad_id' => 50, 'elemento_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 13, 'intensidad_id' => 51, 'elemento_id' => 3],
            ['rango_inicial' => 1, 'rango_final' => 1, 'defecto_id' => 13, 'intensidad_id' => 52, 'elemento_id' => 3],
            ['rango_inicial' => 2, 'rango_final' => 2, 'defecto_id' => 13, 'intensidad_id' => 53, 'elemento_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 14, 'intensidad_id' => 54, 'elemento_id' => 3],
            ['rango_inicial' => 0.0, 'rango_final' => 1.0, 'defecto_id' => 14, 'intensidad_id' => 55, 'elemento_id' => 3],
            ['rango_inicial' => 1.0, 'rango_final' => 2.0, 'defecto_id' => 14, 'intensidad_id' => 56, 'elemento_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 15, 'intensidad_id' => 57, 'elemento_id' => 3],
            ['rango_inicial' => 0, 'rango_final' => 1, 'defecto_id' => 15, 'intensidad_id' => 58, 'elemento_id' => 3],
            ['rango_inicial' => 1, 'rango_final' => 1.5, 'defecto_id' => 15, 'intensidad_id' => 59, 'elemento_id' => 3],

            ['rango_inicial' => 0, 'rango_final' => 0, 'defecto_id' => 16, 'intensidad_id' => 60, 'elemento_id' => 3],
            ['rango_inicial' => 0, 'rango_final' => 1, 'defecto_id' => 16, 'intensidad_id' => 61, 'elemento_id' => 3],
            ['rango_inicial' => 1, 'rango_final' => 2, 'defecto_id' => 16, 'intensidad_id' => 62, 'elemento_id' => 3],

            ['rango_inicial' => 5, 'rango_final' => 5, 'defecto_id' => 17, 'intensidad_id' => 63, 'elemento_id' => 4],
            ['rango_inicial' => 3, 'rango_final' => 5, 'defecto_id' => 17, 'intensidad_id' => 64, 'elemento_id' => 4],
            ['rango_inicial' => 1, 'rango_final' => 3, 'defecto_id' => 17, 'intensidad_id' => 65, 'elemento_id' => 4],

            ['rango_inicial' => 1, 'rango_final' => 2, 'defecto_id' => 18, 'intensidad_id' => 66, 'elemento_id' => 4],
            ['rango_inicial' => 2, 'rango_final' => 3, 'defecto_id' => 18, 'intensidad_id' => 67, 'elemento_id' => 4],

            ['rango_inicial' => 0.3, 'rango_final' => 0.5, 'defecto_id' => 19, 'intensidad_id' => 68, 'elemento_id' => 4],
            ['rango_inicial' => 0.5, 'rango_final' => 1, 'defecto_id' => 19, 'intensidad_id' => 69, 'elemento_id' => 4],

            ['rango_inicial' => 5, 'rango_final' => 5, 'defecto_id' => 20, 'intensidad_id' => 70, 'elemento_id' => 5],
            ['rango_inicial' => 4, 'rango_final' => 5, 'defecto_id' => 20, 'intensidad_id' => 71, 'elemento_id' => 5],
            ['rango_inicial' => 2, 'rango_final' => 4, 'defecto_id' => 20, 'intensidad_id' => 72, 'elemento_id' => 5],

            ['rango_inicial' => 0.5, 'rango_final' => 1, 'defecto_id' => 21, 'intensidad_id' => 73, 'elemento_id' => 5],
            ['rango_inicial' => 1, 'rango_final' => 2, 'defecto_id' => 21, 'intensidad_id' => 74, 'elemento_id' => 5],

            ['rango_inicial' => 0.2, 'rango_final' => 0.5, 'defecto_id' => 22, 'intensidad_id' => 75, 'elemento_id' => 5],
            ['rango_inicial' => 0.5, 'rango_final' => 1, 'defecto_id' => 22, 'intensidad_id' => 76, 'elemento_id' => 5],

        ]);

        $collection->each(function ($item) {

            factory(App\Rango::class)->create([
                'rango_inicial' => $item['rango_inicial'],
                'rango_final'   => $item['rango_final'],
                'defecto_id'    => $item['defecto_id'],
                'intensidad_id' => $item['intensidad_id'],
                'elemento_id'   => $item['elemento_id'],
            ]);
        });
    }
}
