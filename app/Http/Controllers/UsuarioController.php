<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Usuario;

class UsuarioController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $usuarios = Usuario::where('eliminado', 0)->get();
        return view('pages/usuarios/mostrar')->with('usuarios', $usuarios);
    }
}
