<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intercambio extends Model
{
    protected $table = "intercambios";

    protected $fillable = [
        'id_art_user_from','id_art_user_to',
    ];
}
