<?php

use App\Autopista;
use Illuminate\Database\Seeder;

class AutopistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            ['descripcion' => 'TOLUCA -ZITÁCUARO', 'cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '40', 'cadenamiento_final_m' => '000'],

            ['descripcion' => 'RAMAL A VALLE DE BRAVO', 'cadenamiento_inicial_km' => '29', 'cadenamiento_inicial_m' => '800', 'cadenamiento_final_km' => '56', 'cadenamiento_final_m' => '400'],

            ['descripcion' => 'DURANGO-YERBANIS', 'cadenamiento_inicial_km' => '10', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '115', 'cadenamiento_final_m' => '250'],

            ['descripcion' => 'YERBANIS-GOMEZ PALACIO', 'cadenamiento_inicial_km' => '115', 'cadenamiento_inicial_m' => '250', 'cadenamiento_final_km' => '232', 'cadenamiento_final_m' => '000'],

            ['descripcion' => 'SAN LUIS POTOSI- RIO VERDE', 'cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '103', 'cadenamiento_final_m' => '000'],

            ['descripcion' => 'SAN LUIS POTOSI-VILLA DE ARRIAGA', 'cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '76', 'cadenamiento_final_m' => '500'],

            ['descripcion' => 'LIBRAMIENTO DE MATEHUALA', 'cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '14', 'cadenamiento_final_m' => '321'],

            ['descripcion' => 'RIO VERDE-CD VALLES', 'cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '113', 'cadenamiento_final_m' => '200'],

            ['descripcion' => 'JIMÉNEZ - SAVALZA (SAVALZA)', 'cadenamiento_inicial_km' => '230', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '188', 'cadenamiento_final_m' => '000'],

            ['descripcion' => 'CHIHUAHUA - CUAUHTÉMOC (CUAUHTÉMOC)', 'cadenamiento_inicial_km' => '10', 'cadenamiento_inicial_m' => '500', 'cadenamiento_final_km' => '102', 'cadenamiento_final_m' => '000'],

            ['descripcion' => 'OJO LAGUNA - FLORES MAGÓN (OJO LAGUNA)', 'cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '77', 'cadenamiento_final_m' => '000'],

            ['descripcion' => 'ACORTAMIENTO FLORES MAGÓN-GALEANA (GALEANA)', 'cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '61', 'cadenamiento_final_m' => '000'],

            ['descripcion' => 'JIMÉNEZ-CAMARGO (JIMÉNEZ)', 'cadenamiento_inicial_km' => '000', 'cadenamiento_inicial_m' => '000', 'cadenamiento_final_km' => '70', 'cadenamiento_final_m' => '000'],
        ]);

        $collection->each(function ($item) {

            factory(App\Autopista::class)->create([
                'descripcion'             => $item['descripcion'],
                'cadenamiento_inicial_km' => $item['cadenamiento_inicial_km'],
                'cadenamiento_inicial_m'  => $item['cadenamiento_inicial_m'],
                'cadenamiento_final_km'   => $item['cadenamiento_final_km'],
                'cadenamiento_final_m'    => $item['cadenamiento_final_m'],
            ]);
        });
    }
}
