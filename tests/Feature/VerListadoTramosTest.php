<?php

namespace Tests\Feature;

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
        $this->visit("utopistas/{$autopista->id}/tramos")
            ->see($autopista->descripcion)
            ->see($autopista->cadenamiento_inicial_km)
            ->see($autopista->cadenamiento_inicial_m)
            ->see($autopista->cadenamiento_final_km)
            ->see($autopista->cadenamiento_final_m);
    }
}
