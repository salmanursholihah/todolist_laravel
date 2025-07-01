<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use App\Exports\KeuanganExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class KeuanganExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new KeuanganExport, 'laporan_keuangan.xlsx');
    }

    public function exportPDF()
    {
        $keuangans = Keuangan::all();
        $pdf = Pdf::loadView('keuangan.pdf', compact('keuangans'));
        return $pdf->download('laporan_keuangan.pdf');
    }
}