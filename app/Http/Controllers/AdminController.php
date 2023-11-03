<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminController extends Controller
{
    public $usuario;
    public $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        Carbon::setLocale('es');
        $this->request = $request;
        if (auth()->user()) {
            $this->completarInformacion();
        }
    }

    private function completarInformacion()
    {
        $date    = Carbon::now()->format('Y-m-d');
        $request = $this->request;
        $usuario = Usuario::find(auth()->user()->id);
        $this->usuario = $usuario;
        view()->share(compact('date', 'request', 'usuario'));
    }
}
