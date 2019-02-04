<?php

use Faker\Generator as Faker;



$factory->define(App\Articulo::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'image' => 'articulodefault.jpg',
        'user_id' => rand(1,20),
    ];
});