<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;
use App\Exports\CatatanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;


class CatatanExportController extends Controller

{

    public function index(){
        $users = User::all();
        return view('admin.catatans.index', compact('users'));
    }
    public function exportExcel()
    {
        return Excel::download(new CatatanExport, 'laporan_catatan.xlsx');
    }

    public function exportPDF()
    {
        $catatans = Catatan::all();
        $pdf = Pdf::loadView('admin.catatans.pdf', compact('catatans'));
        return $pdf->download('laporan_catatan.pdf');
    }
    public function exportPerBulan( request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $catatans = Catatan::whereMonth('created_at', $month)
                            ->whereYear('created_at', $year)
                            ->get();

   $pdf = Pdf::loadView('admin.catatans.export', compact('catatans', 'month', 'year'));

    return $pdf->download("catatan_{$month}_{$year}.pdf");
        
    }

    public function exportPerUser(Request $request)
    {
        $id = $request->user_id ?? auth()->id();
        $user = User::findOrFail($id);
        $catatans = Catatan::where('user_id', $user->id)->with('user')->get();

        if ($catatans->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Bersihkan encoding agar UTF-8 aman
        foreach ($catatans as $catatan) {
            foreach (['title', 'description', 'target', 'kendala', 'solusi'] as $field) {
                $catatan->{$field} = mb_convert_encoding($catatan->{$field} ?? '', 'UTF-8', 'UTF-8, ISO-8859-1, ASCII');
            }
        }

        $user->name = mb_convert_encoding($user->name, 'UTF-8', 'UTF-8, ISO-8859-1, ASCII');

        $pdf = Pdf::loadView('exports.catatan_user', compact('catatans', 'user'))
                 ->setPaper('A4', 'landscape');

        $pdf->setOptions([
            'defaultFont' => 'DejaVu Sans',
            'isHtml5ParserEnabled' => true,
            'defaultEncoding' => 'UTF-8',
        ]);

        return $pdf->download("catatan_{$user->name}.pdf");
    }
}
