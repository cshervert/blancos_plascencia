<?php

namespace App\Exports;

use App\Models\Cliente;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ClienteExport implements FromView
{
    public function view(): View
    {
        return view('pages.exports.cliente', [
            'items' =>Cliente::with('datos_facturacion')
            ->join('grupos_clientes', 'clientes.id', '=', 'grupos_clientes.id_cliente')
            ->join('grupos', 'grupos_clientes.id_grupo', '=', 'grupos.id')
            ->select('clientes.*','grupos.nombre as grupo')->get()
        ]);
    }
}
