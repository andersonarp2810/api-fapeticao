<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'texto' => $faker->text(),
        'id_professor' => function(){
            return App\Professor::all()->random();
        }
    ];
});
