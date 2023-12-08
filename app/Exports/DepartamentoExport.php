<?php

namespace App\Exports;

use App\Models\Departamento;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DepartamentoExport implements FromView
{
    public function view(): View
    {
        return view('pages.exports.departamento', [
            'items' =>Departamento::get()
        ]);
    }
}
