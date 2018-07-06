<?php

namespace Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class IniciarSesionTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_registrado_puede_iniciar_sesion()
    {
        $this->withExceptionHandling();

        $user = creaUsuarioTest();

        $this->visit('login')
            ->type($user->email, 'email')
            ->type('develop', 'password')
            ->press('Entrar')
            ->seePageIs('/inicio');
    }

    /** @test */
    public function usuario_no_registrado_no_puede_iniciar_sesion()
    {
        $this->withExceptionHandling();

        $user = creaUsuarioTest();

        $this->visit('login')
            ->type(!$user->email, 'email')
            ->type('descsac', 'password')
            ->press('Entrar')
            ->seePageIs('/login');
    }
}
