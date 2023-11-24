<?php

namespace App\Exports;

use App\Models\PuestoTrabajo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PuestoTrabajoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PuestoTrabajo::all();
    }

    public function headings() : array 
    {
        return ["ID","Puesto","Activo"];
    }
}
