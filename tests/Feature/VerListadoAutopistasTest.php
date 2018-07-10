<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VerListadoAutopistasTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_logueado_puede_ver_listado_de_autopistas_asignadas()
    {
        $this->withExceptionHandling();
        $user      = creaUsuarioTest();
        $autopista = factory(Autopista::class)->create();
        $user->asignaAutopista($autopista);

        $this->signIn($user);
        $this->visit('/autopistas')
            ->see($autopista->descripcion)
            ->see($autopista->cadenamiento_inicial_km)
            ->see($autopista->cadenamiento_inicial_m)
            ->see($autopista->cadenamiento_final_km)
            ->see($autopista->cadenamiento_final_m);
    }
}
