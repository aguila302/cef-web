<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrarUsuarioTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_autenticado_puede_registrar_un_usuario()
    {
        $this->withExceptionHandling();
        $user = creaUsuarioTest();

        $this->signIn($user);

        $this->visit('/usuarios/registrar')
            ->type('Usuario de prueba', 'name')
            ->type('develop@calymayor.com.mx', 'email')
            ->type('user-develop', 'username')
            ->type('develop', 'password')
            ->press('Guardar');

        $this->seeInDatabase('users', [
            'name'     => 'Usuario de prueba',
            'email'    => 'develop@calymayor.com.mx',
            'username' => 'user-develop',
        ]);
    }
}
