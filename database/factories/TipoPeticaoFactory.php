<?php

use Faker\Generator as Faker;

$factory->define(App\TipoPeticao::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'descricao' => $faker->text,
        'modelo' => $faker->text
    ];
});
