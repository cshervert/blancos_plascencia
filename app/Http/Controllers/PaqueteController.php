<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Paquete;

class PaqueteController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $paquetes = Paquete::where('eliminado', 0)->get();
        return view('pages/paquetes/mostrar')
            ->with('paquetes', $paquetes);
    }
}
