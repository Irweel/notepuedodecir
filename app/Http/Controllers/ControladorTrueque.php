<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorTrueque extends Controller
{
    public function show()
    {
        return view('editar_usuario');
    }
}
