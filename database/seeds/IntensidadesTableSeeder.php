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
            ['elemento_id' => 1, 'descripcion' => 'TRES ZONAS AISLADAS PEQUEÑAS POR SECCION', 'defecto_id' => 1],
            ['elemento_id' => 1, 'descripcion' => 'SEIS ZONAS AISLADAS AMPLIAS POR SECCION', 'defecto_id' => 1],
            ['elemento_id' => 1, 'descripcion' => 'GENERALIZADAS > 30 % LONG', 'defecto_id' => 1],
            ['elemento_id' => 1, 'descripcion' => 'NO SE OBSERVAN', 'defecto_id' => 1],
            ['elemento_id' => 1, 'descripcion' => 'CORREGIDAS', 'defecto_id' => 1],
            ['elemento_id' => 1, 'descripcion' => 'TRES ZONAS AISLADAS PEQUEÑAS POR SECCION', 'defecto_id' => 2],
            ['elemento_id' => 1, 'descripcion' => 'SEIS ZONAS AISLADAS AMPLIAS POR SECCION', 'defecto_id' => 2],
            ['elemento_id' => 1, 'descripcion' => 'GENERALIZADAS > 30 % LONG', 'defecto_id' => 2],
            ['elemento_id' => 1, 'descripcion' => 'NO SE OBSERVAN', 'defecto_id' => 2],
            ['elemento_id' => 1, 'descripcion' => 'CORREGIDAS', 'defecto_id' => 2],
            ['elemento_id' => 1, 'descripcion' => 'TRES ZONAS AISLADAS PEQUEÑAS POR SECCION', 'defecto_id' => 3],
            ['elemento_id' => 1, 'descripcion' => 'SEIS ZONAS AISLADAS AMPLIAS POR SECCION', 'defecto_id' => 3],
            ['elemento_id' => 1, 'descripcion' => 'GENERALIZADAS > 30 % LONG', 'defecto_id' => 3],
            ['elemento_id' => 1, 'descripcion' => 'NO SE OBSERVAN', 'defecto_id' => 3],
            ['elemento_id' => 1, 'descripcion' => 'CORREGIDAS', 'defecto_id' => 3],
            ['elemento_id' => 1, 'descripcion' => 'TRES ZONAS AISLADAS PEQUEÑAS POR SECCION', 'defecto_id' => 4],
            ['elemento_id' => 1, 'descripcion' => 'SEIS ZONAS AISLADAS AMPLIAS POR SECCION', 'defecto_id' => 4],
            ['elemento_id' => 1, 'descripcion' => 'GENERALIZADAS > 30 % LONG', 'defecto_id' => 4],
            ['elemento_id' => 1, 'descripcion' => 'NO SE OBSERVAN', 'defecto_id' => 4],
            ['elemento_id' => 1, 'descripcion' => 'CORREGIDAS', 'defecto_id' => 4],
            ['elemento_id' => 1, 'descripcion' => 'TRES ZONAS AISLADAS PEQUEÑAS POR SECCION', 'defecto_id' => 5],
            ['elemento_id' => 1, 'descripcion' => 'SEIS ZONAS AISLADAS AMPLIAS POR SECCION', 'defecto_id' => 5],
            ['elemento_id' => 1, 'descripcion' => 'GENERALIZADAS > 30 % LONG', 'defecto_id' => 5],
            ['elemento_id' => 1, 'descripcion' => 'NO SE OBSERVAN', 'defecto_id' => 5],
            ['elemento_id' => 1, 'descripcion' => 'CORREGIDAS', 'defecto_id' => 5],
            ['elemento_id' => 1, 'descripcion' => 'TRES ZONAS AISLADAS PEQUEÑAS POR SECCION', 'defecto_id' => 6],
            ['elemento_id' => 1, 'descripcion' => 'SEIS ZONAS AISLADAS AMPLIAS POR SECCION', 'defecto_id' => 6],
            ['elemento_id' => 1, 'descripcion' => 'GENERALIZADAS > 30 % LONG', 'defecto_id' => 6],
            ['elemento_id' => 1, 'descripcion' => 'NO SE OBSERVAN', 'defecto_id' => 6],
            ['elemento_id' => 1, 'descripcion' => 'CORREGIDAS', 'defecto_id' => 6],

            ['elemento_id' => 2, 'descripcion' => 'SATISFACTORIO', 'defecto_id' => 7],
            ['elemento_id' => 2, 'descripcion' => 'OBSTRUIDO PARCIALMENTE', 'defecto_id' => 7],
            ['elemento_id' => 2, 'descripcion' => 'OBSTRUIDO TOTALMENTE', 'defecto_id' => 7],
            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MENORES', 'defecto_id' => 7],
            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MAYORES', 'defecto_id' => 7],

            ['elemento_id' => 2, 'descripcion' => 'SATISFACTORIO', 'defecto_id' => 8],
            ['elemento_id' => 2, 'descripcion' => 'OBSTRUIDO PARCIALMENTE', 'defecto_id' => 8],
            ['elemento_id' => 2, 'descripcion' => 'OBSTRUIDO TOTALMENTE', 'defecto_id' => 8],
            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MENORES', 'defecto_id' => 8],
            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MAYORES', 'defecto_id' => 8],

            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MENORES', 'defecto_id' => 9],
            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MAYORES', 'defecto_id' => 9],

            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MENORES', 'defecto_id' => 10],
            ['elemento_id' => 2, 'descripcion' => 'DEFECTOS FÍSICOS MAYORES', 'defecto_id' => 10],

            ['elemento_id' => 3, 'descripcion' => 'SIN DEFICIENCIAS', 'defecto_id' => 11],
            ['elemento_id' => 3, 'descripcion' => 'HASTA EN EL 50 % DE LA SECCION', 'defecto_id' => 11],
            ['elemento_id' => 3, 'descripcion' => 'EN MAS DEL 50 % DE LA SECCION', 'defecto_id' => 11],

            ['elemento_id' => 3, 'descripcion' => 'SIN DEFICIENCIAS', 'defecto_id' => 12],
            ['elemento_id' => 3, 'descripcion' => 'HASTA EN EL 50 % DE LA SECCION', 'defecto_id' => 12],
            ['elemento_id' => 3, 'descripcion' => 'EN MAS DEL 50 % DE LA SECCION', 'defecto_id' => 12],

            ['elemento_id' => 3, 'descripcion' => 'SIN DEFICIENCIAS', 'defecto_id' => 13],
            ['elemento_id' => 3, 'descripcion' => 'HASTA EN DOS LUGARES POR SECCION', 'defecto_id' => 13],
            ['elemento_id' => 3, 'descripcion' => 'MAS DE DOS LUGARES POR SECCION', 'defecto_id' => 13],

            ['elemento_id' => 3, 'descripcion' => 'SIN DEFICIENCIAS', 'defecto_id' => 14],
            ['elemento_id' => 3, 'descripcion' => 'HASTA EN DOS LUGARES POR SECCION', 'defecto_id' => 14],
            ['elemento_id' => 3, 'descripcion' => 'MAS DE DOS LUGARES POR SECCION', 'defecto_id' => 14],

            ['elemento_id' => 3, 'descripcion' => 'SIN DEFICIENCIAS', 'defecto_id' => 15],
            ['elemento_id' => 3, 'descripcion' => 'HASTA EN DOS LUGARES POR SECCION', 'defecto_id' => 15],
            ['elemento_id' => 3, 'descripcion' => 'MAS DE DOS LUGARES POR SECCION', 'defecto_id' => 15],

            ['elemento_id' => 3, 'descripcion' => 'SIN DEFICIENCIAS', 'defecto_id' => 16],
            ['elemento_id' => 3, 'descripcion' => 'HASTA EN DOS LUGARES POR SECCION', 'defecto_id' => 16],
            ['elemento_id' => 3, 'descripcion' => 'MAS DE DOS LUGARES POR SECCION', 'defecto_id' => 16],

            ['elemento_id' => 4, 'descripcion' => 'SIN DEFICIENCIAS', 'defecto_id' => 17],
            ['elemento_id' => 4, 'descripcion' => 'POCAS DEFICIENCIAS < 30 %', 'defecto_id' => 17],
            ['elemento_id' => 4, 'descripcion' => 'MUCHAS DEFICIENCIAS > 30 %', 'defecto_id' => 17],

            ['elemento_id' => 4, 'descripcion' => 'POCAS DEFICIENCIAS < 30 %', 'defecto_id' => 18],
            ['elemento_id' => 4, 'descripcion' => 'MUCHAS DEFICIENCIAS > 30 %', 'defecto_id' => 18],

            ['elemento_id' => 4, 'descripcion' => 'POCAS DEFICIENCIAS < 30 %', 'defecto_id' => 19],
            ['elemento_id' => 4, 'descripcion' => 'MUCHAS DEFICIENCIAS > 30 %', 'defecto_id' => 19],

            ['elemento_id' => 5, 'descripcion' => 'SIN DEFICIENCIAS', 'defecto_id' => 20],
            ['elemento_id' => 5, 'descripcion' => 'POCAS DEFICIENCIAS < 30 %', 'defecto_id' => 20],
            ['elemento_id' => 5, 'descripcion' => 'MUCHAS DEFICIENCIAS > 30 %', 'defecto_id' => 20],

            ['elemento_id' => 5, 'descripcion' => 'POCAS DEFICIENCIAS < 30 %', 'defecto_id' => 21],
            ['elemento_id' => 5, 'descripcion' => 'MUCHAS DEFICIENCIAS > 30 %', 'defecto_id' => 21],

            ['elemento_id' => 5, 'descripcion' => 'POCAS DEFICIENCIAS < 30 %', 'defecto_id' => 22],
            ['elemento_id' => 5, 'descripcion' => 'MUCHAS DEFICIENCIAS > 30 %', 'defecto_id' => 22],
        ]);

        $collection->each(function ($item) {

            factory(App\Intensidad::class)->create([
                'descripcion' => $item['descripcion'],
                'elemento_id' => $item['elemento_id'],
                'defecto_id'  => $item['defecto_id'],
            ]);
        });
    }
}
