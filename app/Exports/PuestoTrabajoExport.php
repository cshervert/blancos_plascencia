<?php

namespace App\Exports;

use App\Models\PuestoTrabajo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PuestoTrabajoExport implements FromView
{
    public function view(): View
    {
        return view('pages.exports.puesto', [
            'items' =>PuestoTrabajo::all()
        ]);
    }

}
