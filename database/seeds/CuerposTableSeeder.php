<?php

use Illuminate\Database\Seeder;

class CuerposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuerpos = array('A', 'B', 'Único', 'Ambos');
        foreach ($cuerpos as &$cuerpo) {
            factory(App\Cuerpo::class)->create([
                'descripcion' => $cuerpo,
            ]);
        }
    }
}
