<?php

namespace Tests\Feature;

use App\Autopista;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class QuitarAutopistaAusuarioTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function quitar_autopistas_a_un_usuario()
    {

        $this->withExceptionHandling();
        $user      = creaUsuarioTest();
        $usuario   = factory(User::class)->create();
        $autopista = factory(Autopista::class)->create();
        $usuario->asignaAutopista($autopista);

        $this->signIn($user);

        $this->visit("/usuarios/{$usuario->id}/actualizar");
        $this->press('Quitar');

        $autopistasAsignadas = $usuario->autopistas;
        $this->assertFalse($autopistasAsignadas->contains($autopista));
    }
}
