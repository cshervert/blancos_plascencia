<?php

namespace App\Exports;

use App\Models\Sucursal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SucursalExport implements FromView
{
    public function view(): View
    {
        return view('pages.exports.sucursal', [
            'items' =>Sucursal::where('eliminado', 0)->get()
        ]);
    }
}
