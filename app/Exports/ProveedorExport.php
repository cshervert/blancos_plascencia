<?php

namespace App\Exports;

use App\Models\Proveedor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProveedorExport implements FromView
{
    public function view(): View
    {
        return view('pages.exports.proveedor', [
            'items' =>Proveedor::with('datos_facturacion')->get()
        ]);
    }
}
