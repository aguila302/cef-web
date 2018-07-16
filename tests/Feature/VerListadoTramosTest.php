<?php

namespace Tests\Feature;

use App\Autopista;
use App\Tramo;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VerListadoTramosTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_logueado_puede_ver_listado_de_tramos_de_una_autopista()
    {
        $this->withExceptionHandling();
        $user      = creaUsuarioTest();
        $autopista = factory(Autopista::class)->create();
        $tramo     = factory(Tramo::class)->create([
            'autopista_id' => $autopista->id,
        ]);

        $user->asignaAutopista($autopista);

        $this->signIn($user);
        $this->visit("autopistas/{$autopista->id}/tramos")
            ->see($tramo->cadenamiento_inicial_km)
            ->see($tramo->cadenamiento_inicial_m)
            ->see($tramo->cadenamiento_final_km)
            ->see($tramo->cadenamiento_final_m);
    }
}
