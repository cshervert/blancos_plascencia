<?php

namespace App\Exports;

use App\Models\Empleado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmpleadosExport implements FromView
{
    public function view(): View
    {
        return view('pages.exports.empleados', [
            'empleados' =>Empleado::where('eliminado', 0)->with('puesto_trabajo')->with('sucursal')->get()
        ]);
    }
}