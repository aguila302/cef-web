<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModificarUsuarioTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_logueado_puede_actualizar_usuario()
    {
        $this->withExceptionHandling();
        $user    = creaUsuarioTest();
        $usuario = factory(User::class)->create();
        $this->signIn($user);

        $this->visit("/usuarios/{$usuario->id}/actualizar")
            ->type('develop', 'name')
            ->type('bechtelar.grant@example.net', 'email')
            ->type('user-develop', 'username')
            ->type('develop', 'password_actual')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Guardar');

        $this->see('El usuario se actualizo exitosamente.');

        $this->seeInDatabase('users', [
            'name'     => 'develop',
            'username' => 'user-develop',
            'email'    => 'bechtelar.grant@example.net',
        ]);
    }
}
