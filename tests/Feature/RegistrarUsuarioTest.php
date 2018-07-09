<?php

namespace Tests\Feature;

use App\User;
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
            ->press('Guardar');

        $this->seeInDatabase('users', [
            'name'     => 'Usuario de prueba',
            'email'    => 'develop@calymayor.com.mx',
            'username' => 'user-develop',
        ]);
    }

    /** @test */
    public function el_nombre_es_requerido()
    {
        $this->registraUsuario(['name' => null])
            ->assertSessionHasErrors(['name']);
    }

    public function registraUsuario($atributos = [])
    {
        $user = creaUsuarioTest();
        $this->withExceptionHandling()->signIn($user);

        $usuario = factory(User::class)->make($atributos);

        return $this->post('usuarios', $usuario->toArray());
    }
}
