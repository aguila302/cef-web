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
            ['descripcion' => 'CORONA DE CAMINOS PAVIMENTADOS', 'valor_ponderado_id' => 1, 'factor_elemento' => 48.75],
            ['descripcion' => 'DRENAJE PARA CAMINOS PAVIMENTADOS, REVESTIDOS O RURALES', 'valor_ponderado_id' => 1, 'factor_elemento' => 6.5],
            ['descripcion' => 'DERECHO DE VIA EN CAMINOS PAVIMENTADOS O REVESTIDOS', 'valor_ponderado_id' => 1, 'factor_elemento' => 9.75],
            ['descripcion' => 'SEÑALAMIENTO VERTICAL Y DISPOSITIVOS PARA EL CONTROL DEL TRANSITO', 'valor_ponderado_id' => 2, 'factor_elemento' => 17.5],
            ['descripcion' => 'SEÑALAMIENTO HORIZONTAL Y MARCAS EN CAMINOS PAVIMENTADOS', 'valor_ponderado_id' => 2, 'factor_elemento' => 17.5],
        ]);

        $collection->each(function ($item) {

            factory(App\Elemento::class)->create([
                'descripcion'        => $item['descripcion'],
                'valor_ponderado_id' => $item['valor_ponderado_id'],
                'factor_elemento'    => $item['factor_elemento'],
            ]);
        });
    }
}
