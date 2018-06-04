<?php

use Faker\Generator as Faker;

$factory->define(App\ParteAtendida::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rg' => (string) (int)$faker->unique()->bothify('###########'),
        'cpf' => (string) (int)$faker->unique()->bothify('###########'),
    ];
});
