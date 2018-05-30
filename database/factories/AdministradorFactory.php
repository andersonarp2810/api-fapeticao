<?php

use Faker\Generator as Faker;

$factory->define(App\Administrador::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cadastro_profissional' => (string)$faker->numberBetween(200000000, 210000000)
    ];
});
