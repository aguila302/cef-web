<?php

use Illuminate\Database\Seeder;

class TramosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            ['cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '20', 'cadenamiento_final_m' => '000', 'autopista_id' => 1],
            ['cadenamiento_inicial_km' => '20', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '40', 'cadenamiento_final_m' => '000', 'autopista_id' => 1],

            ['cadenamiento_inicial_km' => '29', 'cadenamiento_inicial_m' => '800', 'cadenamiento_final_km' => '42', 'cadenamiento_final_m' => '800', 'autopista_id' => 2],
            ['cadenamiento_inicial_km' => '42', 'cadenamiento_inicial_m' => '800', 'cadenamiento_final_km' => '56', 'cadenamiento_final_m' => '400', 'autopista_id' => 2],

        ]);

        $collection->each(function ($item) {

            factory(App\Tramo::class)->create([
                'cadenamiento_inicial_km' => $item['cadenamiento_inicial_km'],
                'cadenamiento_inicial_m'  => $item['cadenamiento_inicial_m'],
                'cadenamiento_final_km'   => $item['cadenamiento_final_km'],
                'cadenamiento_final_m'    => $item['cadenamiento_final_m'],
                'autopista_id'            => $item['autopista_id'],
            ]);
        });

        $this->registraSecciones();
    }

    /* Registra secciones de un tramos. */
    public function registraSecciones()
    {
        $collection = collect([
            ['cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '10', 'cadenamiento_final_m' => '000', 'autopista_id' => 1, 'tramo_id' => 1],
            ['cadenamiento_inicial_km' => '10', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '20', 'cadenamiento_final_m' => '000', 'autopista_id' => 1, 'tramo_id' => 1],

            ['cadenamiento_inicial_km' => '20', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '30', 'cadenamiento_final_m' => '000', 'autopista_id' => 1, 'tramo_id' => 2],
            ['cadenamiento_inicial_km' => '30', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '40', 'cadenamiento_final_m' => '000', 'autopista_id' => 1, 'tramo_id' => 2],

            ['cadenamiento_inicial_km' => '29', 'cadenamiento_inicial_m' => '800', 'cadenamiento_final_km' => '40', 'cadenamiento_final_m' => '000', 'autopista_id' => 2, 'tramo_id' => 3],
            ['cadenamiento_inicial_km' => '40', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '42', 'cadenamiento_final_m' => '800', 'autopista_id' => 2, 'tramo_id' => 3],

            ['cadenamiento_inicial_km' => '42', 'cadenamiento_inicial_m' => '800', 'cadenamiento_final_km' => '50', 'cadenamiento_final_m' => '000', 'autopista_id' => 2, 'tramo_id' => 4],
        ]);

        $collection->each(function ($item) {

            factory(App\Seccion::class)->create([
                'cadenamiento_inicial_km' => $item['cadenamiento_inicial_km'],
                'cadenamiento_inicial_m'  => $item['cadenamiento_inicial_m'],
                'cadenamiento_final_km'   => $item['cadenamiento_final_km'],
                'cadenamiento_final_m'    => $item['cadenamiento_final_m'],
                'autopista_id'            => $item['autopista_id'],
                'tramo_id'                => $item['tramo_id'],
            ]);
        });
    }
}
