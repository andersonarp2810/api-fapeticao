<?php

use Faker\Generator as Faker;

$factory->define(App\Professor::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'matricula' => (string)$faker->numberBetween(200000000, 210000000)
    ];
});
