<?php

use Illuminate\Database\Seeder;

class IntensidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            ['elemento_id' => 1, 'descripcion' => 'TRES ZONAS AISLADAS PEQUEÑAS POR SECCION'],
            ['elemento_id' => 1, 'descripcion' => 'SEIS ZONAS AISLADAS AMPLIAS POR SECCION'],
            ['elemento_id' => 1, 'descripcion' => 'GENERALIZADAS > 30 % LONG'],
            ['elemento_id' => 1, 'descripcion' => 'NO SE OBSERVAN'],
            ['elemento_id' => 1, 'descripcion' => 'CORREGIDAS'],

            ['elemento_id' => 2, 'descripcion' => 'SATISFACTORIO'],
            ['elemento_id' => 2, 'descripcion' => 'OBSTRUIDO PARCIALMENTE'],
            ['elemento_id' => 2, 'descripcion' => 'OBSTRUIDO TOTALMENTE'],
            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MENORES'],
            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MAYORES'],

            ['elemento_id' => 3, 'descripcion' => 'SIN DEFICIENCIAS'],
            ['elemento_id' => 3, 'descripcion' => 'HASTA EN EL 50 % DE LA SECCION'],
            ['elemento_id' => 3, 'descripcion' => 'EN MAS DEL 50 % DE LA SECCION'],
            ['elemento_id' => 3, 'descripcion' => 'HASTA EN DOS LUGARES POR SECCION'],
            ['elemento_id' => 3, 'descripcion' => 'MAS DE DOS LUGARES POR SECCION'],

            ['elemento_id' => 4, 'descripcion' => 'SIN DEFICIENCIAS'],
            ['elemento_id' => 4, 'descripcion' => 'POCAS DEFICIENCIAS < 30 %'],
            ['elemento_id' => 4, 'descripcion' => 'MUCHAS DEFICIENCIAS > 30 %'],

            ['elemento_id' => 5, 'descripcion' => 'SIN DEFICIENCIAS'],
            ['elemento_id' => 5, 'descripcion' => 'POCAS DEFICIENCIAS < 30 %'],
            ['elemento_id' => 5, 'descripcion' => 'MUCHAS DEFICIENCIAS > 30 %'],
        ]);

        $collection->each(function ($item) {

            factory(App\Intensidad::class)->create([
                'descripcion' => $item['descripcion'],
                'elemento_id' => $item['elemento_id'],
            ]);
        });
    }
}
