<?php

namespace Tests\Feature;

use App\Autopista;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AsignaAutopistaAusuarioTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function asignar_autopistas_a_un_usuario()
    {

        $this->withExceptionHandling();
        $user      = creaUsuarioTest();
        $usuario   = factory(User::class)->create();
        $autopista = factory(Autopista::class)->create();

        $this->signIn($user);

        $this->visit("/usuarios/{$usuario->id}/actualizar");
        $this->select($autopista->id, 'autopistas');
        $this->press('Asignar');

        $autopistasAsignadas = $usuario->autopistas;
        $this->assertTrue($autopistasAsignadas->contains($autopista));
    }

}
