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
            ['cadenamiento_inicial_km' => 100, 'cadenamiento_inicial_m' => 181, 'cadenamiento_final_km' => 200, 'cadenamiento_final_m' => 170, 'autopista_id' => 1],
            ['cadenamiento_inicial_km' => 201, 'cadenamiento_inicial_m' => 181, 'cadenamiento_final_km' => 300, 'cadenamiento_final_m' => 170, 'autopista_id' => 1],
            ['cadenamiento_inicial_km' => 301, 'cadenamiento_inicial_m' => 181, 'cadenamiento_final_km' => 400, 'cadenamiento_final_m' => 170, 'autopista_id' => 1],

            ['cadenamiento_inicial_km' => 100, 'cadenamiento_inicial_m' => 181, 'cadenamiento_final_km' => 50, 'cadenamiento_final_m' => 170, 'autopista_id' => 2],
            ['cadenamiento_inicial_km' => 51, 'cadenamiento_inicial_m' => 181, 'cadenamiento_final_km' => 150, 'cadenamiento_final_m' => 170, 'autopista_id' => 2],
            ['cadenamiento_inicial_km' => 151, 'cadenamiento_inicial_m' => 181, 'cadenamiento_final_km' => 250, 'cadenamiento_final_m' => 170, 'autopista_id' => 2],
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
    }
}
