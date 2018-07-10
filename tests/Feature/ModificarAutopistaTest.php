<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModificarAutopistaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_logueado_puede_actualizar_autopista()
    {
        $this->withExceptionHandling();
        $user      = creaUsuarioTest();
        $autopista = factory(Autopista::class)->create();
        $this->signIn($user);

        $this->visit("/autopistas/{$autopista->id}/actualizar")
            ->type('Mexico - Queretaro', 'descripcion')
            ->type('120', 'cadenamiento_inicial_km')
            ->type('110', 'cadenamiento_inicial_m')
            ->type('500', 'cadenamiento_final_km')
            ->type('123', 'cadenamiento_final_m')
            ->press('Guardar');

        $this->see('La autopista se actualizo exitosamente.');

        $this->seeInDatabase('autopistas', [
            'descripcion'             => 'Mexico - Queretaro',
            'cadenamiento_inicial_km' => '120',
            'cadenamiento_inicial_m'  => '110',
            'cadenamiento_final_km'   => '500',
            'cadenamiento_final_m'    => '123',
        ]);
    }
}
