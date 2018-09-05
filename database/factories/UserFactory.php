<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\Autopista::class, function (Faker $faker) {
    return [
        'descripcion'             => $faker->streetAddress,
        'cadenamiento_inicial_km' => $faker->numberBetween($min = 000, $max = 900),
        'cadenamiento_inicial_m'  => $faker->numberBetween($min = 000, $max = 900),

        'cadenamiento_final_km'   => $faker->numberBetween($min = 000, $max = 900),
        'cadenamiento_final_m'    => $faker->numberBetween($min = 000, $max = 900),
    ];
});

$factory->define(App\Cuerpo::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    ];
});

$factory->define(App\ElementoGeneral::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    ];
});

$factory->define(App\ValorPonderado::class, function (Faker $faker) {
    return [
        'valor_ponderado'            => $faker->randomDigit,
        'elemento_general_camino_id' => function () {
            return factory(App\ElementoGeneral::class)->create()->id;
        },
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'username'       => $faker->unique()->username,
        'password'       => bcrypt('develop'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Elemento::class, function (Faker $faker) {
    return [
        'descripcion'        => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'factor_elemento'    => $faker->randomDigit,
        'valor_ponderado_id' => function () {
            return factory(App\ValorPonderado::class)->create()->id;
        },
    ];
});

$factory->define(App\FactorElemento::class, function (Faker $faker) {
    return [
        'factor_elemento' => $faker->randomDigit,
        'elemento_id'     => function () {
            return factory(App\Elemento::class)->create()->id;
        },
    ];
});

$factory->define(App\Defecto::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'elemento_id' => function () {
            return factory(App\Elemento::class)->create()->id;
        },
    ];
});

$factory->define(App\Intensidad::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'elemento_id' => function () {
            return factory(App\Elemento::class)->create()->id;
        },
        'defecto_id'  => function () {
            return factory(App\Defecto::class)->create()->id;
        },
    ];
});

$factory->define(App\Rango::class, function (Faker $faker) {
    return [
        'rango_inicial' => $faker->randomDigit,
        'rango_final'   => $faker->randomDigit,
        'defecto_id'    => function () {
            return factory(App\Defecto::class)->create()->id;
        },
        'intensidad_id' => function () {
            return factory(App\Intensidad::class)->create()->id;
        },
        'elemento_id'   => function () {
            return factory(App\Elemento::class)->create()->id;
        },
    ];
});

$factory->define(App\Tramo::class, function (Faker $faker) {
    return [
        'cadenamiento_inicial_km' => $faker->numberBetween($min = 000, $max = 900),
        'cadenamiento_inicial_m'  => $faker->numberBetween($min = 000, $max = 900),
        'cadenamiento_final_km'   => $faker->numberBetween($min = 000, $max = 900),
        'cadenamiento_final_m'    => $faker->numberBetween($min = 000, $max = 900),
        'autopista_id'            => function () {
            return factory(App\Autopista::class)->create()->id;
        },
    ];
});

$factory->define(App\Seccion::class, function (Faker $faker) {
    return [
        'cadenamiento_inicial_km' => $faker->numberBetween($min = 000, $max = 900),
        'cadenamiento_inicial_m'  => $faker->numberBetween($min = 000, $max = 900),
        'cadenamiento_final_km'   => $faker->numberBetween($min = 000, $max = 900),
        'cadenamiento_final_m'    => $faker->numberBetween($min = 000, $max = 900),
        'autopista_id'            => function () {
            return factory(App\Autopista::class)->create()->id;
        },
        'tramo_id'                => function () {
            return factory(App\Tramo::class)->create()->id;
        },
    ];
});
