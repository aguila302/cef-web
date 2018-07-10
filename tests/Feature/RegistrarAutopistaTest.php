<?php

namespace Tests\Feature;

use App\Autopista;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegistrarAutopistaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function usuario_logueado_puede_registrar_autopista()
    {
        $this->withExceptionHandling();
        $user = creaUsuarioTest();

        $this->signIn($user);

        $this->visit('/autopistas/registrar')
            ->type('Nueva autopista de prueba', 'descripcion')
            ->type('200', 'cadenamiento_inicial_km')
            ->type('110', 'cadenamiento_inicial_m')
            ->type('300', 'cadenamiento_final_km')
            ->type('123', 'cadenamiento_final_m')
            ->press('Guardar');

        $this->seeInDatabase('autopistas', [
            'descripcion'             => 'Nueva autopista de prueba',
            'cadenamiento_inicial_km' => '200',
            'cadenamiento_inicial_m'  => '110',
            'cadenamiento_final_km'   => '300',
            'cadenamiento_final_m'    => '123',
        ]);
    }

    /** @test */
    public function la_descripcion_es_requerida()
    {
        $this->registrarAutopista(['descripcion' => null])
            ->assertSessionHasErrors(['descripcion']);
    }

    public function registrarAutopista($atributos = [])
    {
        $user = creaUsuarioTest();
        $this->withExceptionHandling()->signIn($user);

        $autopista = factory(Autopista::class)->make($atributos);

        return $this->post('autopistas', $autopista->toArray());
    }

    /** @test */
    public function cadenamiento_final_km_debe_ser_mayor_que_cadenamiento_inicial_km()
    {
        $this->registrarAutopista([
            'descripcion'             => 'Nueva autopista de prueba',
            'cadenamiento_inicial_km' => '200',
            'cadenamiento_inicial_m'  => '110',
            'cadenamiento_final_km'   => '150',
            'cadenamiento_final_m'    => '123',
        ])->assertSessionHasErrors(['cadenamiento_final_km']);
    }
}
