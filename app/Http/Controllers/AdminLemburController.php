<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lembur;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LemburExport; 

class AdminLemburController extends Controller
{

    public function index()
    {
        $lemburs = Lembur::with('user')->latest()->get();
        $users = User::all();

        return view('admin.lembur.index', compact('lemburs','users'));
    }

    public function approve($id)
    {
        $lemburs = Lembur::findOrFail($id);
        $lemburs->update(['status' => 'approved', 'catatan' => null]);

        return back()->with('success', 'Lembur approved.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required|string',
        ]);

        $lemburs = Lembur::findOrFail($id);
        $lemburs->update([
            'status' => 'rejected',
            'catatan' => $request->catatan,
        ]);

        return back()->with('success', 'Lembur Rejected.');
    }




        public function exportPerBulan(Request $request)
{
    $month = $request->input('month');
    $year = $request->input('year');

    $lemburs= Lembur::whereMonth('created_at', $month)
                        ->whereYear('created_at', $year)
                        ->get();

    $lemburs= $this->toUtf8($lemburs);

    $pdf = Pdf::loadView('admin.lembur.export', compact('lemburs', 'month', 'year'));
    $pdf->setPaper('A4',orientation: 'landscape');

    return $pdf->download("lembur_{$month}_{$year}.pdf");
}



public function exportPerUser(Request $request)
{
    $id = $request->user_id ?? auth()->id();
    $user = User::findOrFail($id);

    $lemburs = Lembur::with('user')
        ->where('user_id', $user->id)
        ->get();

    if ($lemburs->isEmpty()) {
        return redirect()->route('admin.lembur.index')->with('error', 'Data tidak ditemukan.');
    }

    $pdf = Pdf::loadView('admin.lembur.export_user', [
        'lemburs' => $lemburs,
        'user' => $user,
    ])->setPaper('A4', 'landscape');

    return $pdf->download("lembur_{$user->name}.pdf");
}



private function toUtf8($data)
{
    if (is_array($data)) {
        return array_map([$this, 'toUtf8'], $data);
    } elseif (is_object($data)) {
        foreach ($data as $key => $value) {
            $data->$key = $this->toUtf8($value);
        }
        return $data;
    } elseif (is_string($data)) {
        // Ubah encoding string ke UTF-8 dari encoding apa pun yang terdeteksi otomatis
        return mb_convert_encoding($data, 'UTF-8', 'auto');
    } else {
        return $data;
    }
}

public function exportExcel()
{
    $lemburs= Lembur::all();

    $lemburs= $this->toUtf8(($lemburs));
         
    return Excel::download(new LemburExport($lemburs), 'lembur.xlsx');
}




}

