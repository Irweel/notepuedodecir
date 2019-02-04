<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntercambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intercambios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user_from');
            $table->integer('id_user_to');
            $table->integer('id_art_user_from');
            $table->integer('id_art_user_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intercambios');
    }
}
