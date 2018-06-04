<?php

use Faker\Generator as Faker;

$factory->define(App\Documento::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'caminho' => $faker->word,
        'id_tipo_documento' => function(){
            return App\TipoDocumento::all()->random();
        }
    ];
});
