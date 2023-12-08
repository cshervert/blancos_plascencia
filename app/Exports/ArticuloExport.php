<?php

namespace App\Exports;

use App\Models\Articulo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArticuloExport implements FromView
{
    public function view(): View
    {
        return view('pages.exports.articulo', [
            'items' =>Articulo::with('categoria')->get()
        ]);
    }
}
