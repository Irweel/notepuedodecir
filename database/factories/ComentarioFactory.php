<?php

use Faker\Generator as Faker;


$factory->define(App\Comentario::class, function (Faker $faker) {
    return [
        'id_user' => rand(1,20),
        'id_art' => rand(1,100),
        'mensaje' => $faker->paragraph,
        
    ];
});

