<?php

namespace Tests\Feature;

use App\Autopista;
use App\Tramo;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrarTramoAutopistaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_logueado_puede_registrar_primer_tramo()
    {
        $this->withExceptionHandling();
        $user      = creaUsuarioTest();
        $autopista = factory(Autopista::class)->create([
            'cadenamiento_inicial_km' => 100,
            'cadenamiento_inicial_m'  => 150,
            'cadenamiento_final_km'   => 400,
            'cadenamiento_final_m'    => 230,
        ]);

        $tramos = $autopista->tramos()->count();
        $this->assertEquals(0, $tramos);

        $this->signIn($user);

        $this->visit("autopistas/{$autopista->id}/tramos/registrar")
            ->type($autopista->cadenamiento_inicial_km, 'cadenamiento_inicial_km')
            ->type($autopista->cadenamiento_inicial_m, 'cadenamiento_inicial_m')
            ->type(200, 'cadenamiento_final_km')
            ->type(123, 'cadenamiento_final_m')
            ->press('Guardar');

        $this->seeInDatabase('tramos', [
            'cadenamiento_inicial_km' => $autopista->cadenamiento_inicial_km,
            'cadenamiento_inicial_m'  => $autopista->cadenamiento_inicial_m,
            'cadenamiento_final_km'   => 200,
            'cadenamiento_final_m'    => 123,
            'autopista_id'            => $autopista->id,
        ]);
    }

    /** @test */
    public function usuario_logueado_puede_registrar_segundo_tramo()
    {
        $this->withExceptionHandling();
        $user      = creaUsuarioTest();
        $autopista = factory(Autopista::class)->create([
            'cadenamiento_inicial_km' => 100,
            'cadenamiento_inicial_m'  => 150,
            'cadenamiento_final_km'   => 400,
            'cadenamiento_final_m'    => 230,
        ]);

        $tramos = factory(Tramo::class)->create([
            'cadenamiento_inicial_km' => 100,
            'cadenamiento_inicial_m'  => 150,
            'cadenamiento_final_km'   => 150,
            'cadenamiento_final_m'    => 127,
            'autopista_id'            => $autopista->id,
        ]);
        $tieneTramos = $autopista->tramos()->count();

        $this->assertEquals(1, $tieneTramos);
        $this->signIn($user);

        $this->visit("autopistas/{$autopista->id}/tramos/registrar")
            ->type($tramos->cadenamiento_final_km, 'cadenamiento_inicial_km')
            ->type($tramos->cadenamiento_final_m, 'cadenamiento_inicial_m')
            ->type(210, 'cadenamiento_final_km')
            ->type(123, 'cadenamiento_final_m')
            ->press('Guardar');

        $this->seeInDatabase('tramos', [
            'cadenamiento_inicial_km' => $tramos->cadenamiento_final_km,
            'cadenamiento_inicial_m'  => $tramos->cadenamiento_final_m,
            'cadenamiento_final_km'   => 210,
            'cadenamiento_final_m'    => 123,
            'autopista_id'            => $autopista->id,
        ]);
    }
}
