<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class VerListadoDeUsuariosTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_autenticado_puede_ver_listado_de_usuarios()
    {
        $this->withExceptionHandling();
        $user = creaUsuarioTest();

        $usuarios = factory(User::class)->create();

        $this->signIn($user);

        $this->visit('/usuarios')
            ->see($usuarios->name)
            ->see($usuarios->username)
            ->see($usuarios->email);

    }
}
