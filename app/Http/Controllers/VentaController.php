<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Moneda;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Caja;

class VentaController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        return view('pages/ventas/mostrar');
    }

    public function nueva()
    {
        $idsucursal = $this->usuario->sucursal->id;
        $monedas    = Moneda::all();
        $empleados  = Empleado::where("activo", 1)->get();
        $clientes   = Cliente::all();
        $cajas      = Caja::where('id_sucursal', $idsucursal)->get();
        return view('pages/ventas/crear')
            ->with('monedas', $monedas)
            ->with('empleados', $empleados)
            ->with('clientes', $clientes)
            ->with('cajas', $cajas);
    }
}
