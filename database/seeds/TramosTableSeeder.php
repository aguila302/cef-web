<?php

use App\Autopista;
use App\Tramo;
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
        Autopista::each(function ($autopista) {

            $inicial = $autopista->cadenamiento_inicial_km;
            $con     = 0;
            $r       = $inicial + $con;
            $r1      = $r + 5;

            factory(Tramo::class, 3)->create([
                'cadenamiento_inicial_km' => $r,
                'cadenamiento_inicial_m'  => 0,
                'cadenamiento_final_km'   => $r1,
                'cadenamiento_final_m'    => 0,
                'autopista_id'            => $autopista->id,
            ]);

            $r = $r1 + 1;
            // dd($r);
        });
    }
}
