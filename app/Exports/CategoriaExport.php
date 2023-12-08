<?php

namespace App\Exports;

use App\Models\Categoria;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CategoriaExport implements FromView
{
    public function view(): View
    {
        return view('pages.exports.categoria', [
            'items' =>Categoria::with('departamento')->get()
        ]);
    }
}
