<?php

use Illuminate\Database\Seeder;

class ElementosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            ['descripcion' => 'CORONA DE CAMINOS PAVIMENTADOS', 'valor_ponderado_id' => 1],
            ['descripcion' => 'DRENAJE PARA CAMINOS PAVIMENTADOS, REVESTIDOS O RURALES', 'valor_ponderado_id' => 1],
            ['descripcion' => 'DERECHO DE VIA EN CAMINOS PAVIMENTADOS O REVESTIDOS', 'valor_ponderado_id' => 1],
            ['descripcion' => 'SEÑALAMIENTO VERTICAL Y DISPOSITIVOS PARA EL CONTROL DEL TRANSITO', 'valor_ponderado_id' => 2],
            ['descripcion' => 'SEÑALAMIENTO HORIZONTAL Y MARCAS EN CAMINOS PAVIMENTADOS', 'valor_ponderado_id' => 2],
        ]);

        $collection->each(function ($item) {

            factory(App\Elemento::class)->create([
                'descripcion'        => $item['descripcion'],
                'valor_ponderado_id' => $item['valor_ponderado_id'],
            ]);
        });
    }
}
