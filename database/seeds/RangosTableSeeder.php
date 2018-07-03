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
