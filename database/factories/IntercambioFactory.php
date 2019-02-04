<?php

use Faker\Generator as Faker;

$factory->define(App\Intercambio::class, function (Faker $faker) {
    return [
        'id_user_from' => rand(1,20),
        'id_user_to' => rand(1,20),
        'id_art_user_from' => rand(1,100),
        'id_art_user_to' => rand(1,100),
        
    ];
});
