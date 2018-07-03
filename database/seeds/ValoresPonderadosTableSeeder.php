<?php

use Illuminate\Database\Seeder;

class ValoresPonderadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            ['valor_ponderado' => 0.65, 'elemento_general_camino_id' => 1],
            ['valor_ponderado' => 0.35, 'elemento_general_camino_id' => 2],
        ]);

        $collection->each(function ($item) {

            factory(App\ValorPonderado::class)->create([
                'valor_ponderado'            => $item['valor_ponderado'],
                'elemento_general_camino_id' => $item['elemento_general_camino_id'],
            ]);
        });
    }
}
