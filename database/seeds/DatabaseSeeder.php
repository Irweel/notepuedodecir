<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();
        factory(App\Articulo::class,100)->create();
        factory(App\Comentario::class, 100)->create();
        factory(App\Intercambio::class, 100)->create();
    }
}
