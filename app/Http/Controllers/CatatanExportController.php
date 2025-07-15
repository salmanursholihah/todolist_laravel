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
    $user_id = $request->user_id ?? auth()->id();
    $user = User::findOrFail($user_id);

    $catatans = Catatan::where('user_id', $user->id)->get();
    $pdf = Pdf::loadView('catatans.export_user', compact('catatans', 'user'));

    return $pdf->download("catatan_{$user->name}.pdf");
}

}