<?php

namespace App\Exports;

use App\Models\Keuangan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeuanganExport implements FromCollection
{
    public function collection()
    {
        return Keuangan::all();
    }
}
