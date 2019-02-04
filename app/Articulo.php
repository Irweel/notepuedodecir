<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = "articulos";

    protected $fillable = [
        'name', 'description', 'image','user_id',
    ];

    

}
