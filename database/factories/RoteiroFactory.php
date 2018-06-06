<?php

use Faker\Generator as Faker;

$factory->define(App\Roteiro::class, function (Faker $faker) {
    return [
        'titulo' => $faker->word(),
        'texto' => $faker->text(),
        'id_professor' => function(){
            return App\Professor::all()->random();
        }
    ];
});
