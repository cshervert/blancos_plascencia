<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('pages/clientes/index', ['clientes' => $clientes]);
    }
}
