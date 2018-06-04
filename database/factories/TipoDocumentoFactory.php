<?php

use Faker\Generator as Faker;

$factory->define(App\TipoDocumento::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'descricao' => $faker->text
    ];
});
