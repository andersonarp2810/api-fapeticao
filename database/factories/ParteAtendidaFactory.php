<?php

use Faker\Generator as Faker;

$factory->define(App\ParteAtendida::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rg' => (string) $faker->numberBetween(20000000001, 30000000000),
        'cpf' => (string) $faker->numberBetween(00000000000, 20000000000)
    ];
});
