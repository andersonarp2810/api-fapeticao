<?php

use Faker\Generator as Faker;

$factory->define(App\Roteiro::class, function (Faker $faker) {
    return [
        'titulo' => $factory->word(),
        'texto' => $faker->text(),
        'id_professor' => function(){
            return App\Professor::all()->random();
        }
    ];
});
