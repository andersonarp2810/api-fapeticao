<?php

use Faker\Generator as Faker;

$factory->define(App\Peticao::class, function (Faker $faker) {
    return [
        'titulo' => $faker->word,
        'texto' => $faker->text,
        'id_documento' => function() {
            return App\Documento::all()->random();
        },
        'id_tipo_peticao' => function() {
            return App\TipoPeticao::all()->random();
        },
        'id_parte_atendida' => function() {
            return App\ParteAtendida::all()->random();
        }
    ];
});
