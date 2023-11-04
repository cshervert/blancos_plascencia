<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Rol;

class RolController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index(Request $request)
    {
        $roles = Rol::all();
        return view('pages/roles/mostrar') ->with('roles', $roles);
    }
}
