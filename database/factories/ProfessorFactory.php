<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'matricula' => (string)$faker->numberBetween(200000000, 210000000)
    ];
});
