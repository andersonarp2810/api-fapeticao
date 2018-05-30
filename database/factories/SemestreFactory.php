<?php

use Faker\Generator as Faker;

$factory->define(App\Semestre::class, function (Faker $faker) {
    return [
        'semestre' =>(string) $faker->numberBetween(1, 10),
        'area_de_atuacao' => $faker->word
    ];
});
