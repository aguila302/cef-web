<?php

use Illuminate\Database\Seeder;

class DefectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            ['elemento_id' => 1, 'descripcion' => 'DEFORMACIONES'],
            ['elemento_id' => 1, 'descripcion' => 'GRIETAS'],
            ['elemento_id' => 1, 'descripcion' => 'AGRIETAMIENTOS POLIGONALES'],
            ['elemento_id' => 1, 'descripcion' => 'CALAVERAS'],
            ['elemento_id' => 1, 'descripcion' => 'BACHES'],
            ['elemento_id' => 1, 'descripcion' => 'TEXTURA DEFECTUOSA'],
            ['elemento_id' => 2, 'descripcion' => 'ALCANTARILLAS, VADOS Y CANALIZACIONES'],
            ['elemento_id' => 2, 'descripcion' => 'CUNETAS'],
            ['elemento_id' => 2, 'descripcion' => 'PENDIENTE TRANSVERSAL, BOMBEO Y SOBREELEVACION'],
            ['elemento_id' => 2, 'descripcion' => 'LAVADEROS, GUARNICIONES O BORDILLOS, CONTRACUNETAS Y CANALES'],
            ['elemento_id' => 3, 'descripcion' => 'VEGETACION CRECIDA'],
            ['elemento_id' => 3, 'descripcion' => 'VEGETACIÓN EN EL RESTO DEL DERECHO DE VÍA CON MÁS DE 1.50 MTS DE ALTURA'],
            ['elemento_id' => 3, 'descripcion' => 'PELIGROS AL TRANSITO O AL CAMINO'],
            ['elemento_id' => 3, 'descripcion' => 'EN LOS CERCADOS'],
            ['elemento_id' => 3, 'descripcion' => 'UTILIZACION INDEBIDA'],
            ['elemento_id' => 4, 'descripcion' => 'SEÑALES'],
            ['elemento_id' => 4, 'descripcion' => 'FANTASMAS'],
            ['elemento_id' => 4, 'descripcion' => 'POSTES DE KILOMETRAJE'],
            ['elemento_id' => 5, 'descripcion' => 'RAYA CENTRAL'],
            ['elemento_id' => 5, 'descripcion' => 'RAYAS LATERALES'],
            ['elemento_id' => 5, 'descripcion' => 'OTRAS MARCAS'],
            ['elemento_id' => 3, 'descripcion' => 'b) Basureros y/o servidumbre NO autorizada'],
        ]);

        $collection->each(function ($item) {

            factory(App\Defecto::class)->create([
                'descripcion' => $item['descripcion'],
                'elemento_id' => $item['elemento_id'],
            ]);
        });
    }
}
