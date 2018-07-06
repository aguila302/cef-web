<?php

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
        $autopistas = array('TOLUCA -ZITÁCUARO',
            'RAMAL A VALLE DE BRAVO',
            'DURANGO-YERBANIS',
            'YERBANIS-GOMEZ PALACIO',
            'SAN LUIS POTOSI- RIO VERDE',
            'SAN LUIS POTOSI-VILLA DE ARRIAGA',
            'LIBRAMIENTO DE MATEHUALA',
            'RIOVERDE-CD VALLES',
            'JIMÉNEZ - SAVALZA (SAVALZA)',
            'CHIHUAHUA - CUAUHTÉMOC (CUAUHTÉMOC)',
            'OJO LAGUNA - FLORES MAGÓN (OJO LAGUNA)',
            'ACORTAMIENTO FLORES MAGÓN-GALEANA (GALEANA)',
            'JIMÉNEZ-CAMARGO (JIMÉNEZ)',
            'CAMARGO-CONCHOS (CAMARGO) CONCHOS – DELICIAS (SAUCILLO)',
            'CHIHUAHUA – SACRAMENTO (SACRAMENTO)',
            'SUECO-VILLA AHUMADA (VILLA AHUMADA)',
            'KANTUNIL-CANCÚN',
            'VIADUCTO ELEVADO BICENTENARIO',
            'LIBRAMIENTO LA PIEDAD',
            'LOS REMEDIOS - ECATEPEC',
            'LIBRAMIENTO NORTE LA LAGUNA');

        foreach ($autopistas as &$autopista) {
            factory(App\Autopista::class)->create([
                'descripcion'             => $autopista,
                'cadenamiento_inicial_km' => 100,
                'cadenamiento_final_km'   => 400,
            ]);
        }
    }
}
