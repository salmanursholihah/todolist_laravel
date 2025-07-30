<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lembur;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LemburExport; 
use App\Models\Setting;
use Carbon\Carbon;

class AdminLemburController extends Controller
{


    public function index()
{
    $rate = Setting::where('key', 'lembur_per_jam')->value('value') ?? 0;

    $lemburs = Lembur::with('user')->latest()->get()->map(function ($item) use ($rate) {
        $start = Carbon::parse($item->jam_mulai);
        $end = Carbon::parse($item->jam_selesai);
        $durasi = $start->diffInMinutes($end) / 60;

        $item->durasi_jam = round($durasi, 2);
        $item->bonus = round($durasi * $rate, 2);
        return $item;
    });

    $users = User::all();

    return view('admin.lembur.index', compact('lemburs', 'users'));
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
            $lemburs->save(),
        ]);

        return back()->with('success', 'Lembur Rejected.');
    }


public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required|after:jam_mulai',
        'alasan' => 'required|string',
    ]);

    $mulai = Carbon::createFromFormat('H:i', $request->jam_mulai);
    $selesai = Carbon::createFromFormat('H:i', $request->jam_selesai);

    $durasiJam = $selesai->diffInMinutes($mulai) / 60;

    // Ambil tarif dari setting
    $rate = Setting::where('key', 'lembur_per_jam')->first()->value ?? 0;
    $bonus = $durasiJam * $rate;

    Lembur::create([
        'user_id' => auth()->id(),
        'tanggal' => $request->tanggal,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'alasan' => $request->alasan,
        'status' => 'pending',
        'bonus' => (int) $bonus,
    ]);

    return redirect()->route('user.lembur.index')->with('success', 'Lembur berhasil diajukan');
}

public function updateLembur(Request $request)
{
    $request->validate([
        'rate' => 'required|numeric|min:0',
    ]);

    Setting::updateOrCreate(
        ['key' => 'lembur_per_jam'],
        ['value' => $request->rate]
    );

    return back()->with('success', 'Nominal lembur per jam berhasil diperbarui.');
}

public function showBonus()
{
    $rate = Setting::where('key', 'lembur_per_jam')->value('value') ?? 0;

    $lemburs = Lembur::with('user')->get()->map(function ($item) use ($rate) {
        $jamMulai = \Carbon\Carbon::parse($item->jam_mulai);
        $jamSelesai = \Carbon\Carbon::parse($item->jam_selesai);
        $durasi = $jamMulai->diffInMinutes($jamSelesai) / 60; // jam lembur

        $item->durasi_jam = round($durasi, 2);
        $item->bonus = round($durasi * $rate, 2);
        return $item;
    });

    return view('admin.lembur.bonus', compact('lemburs', 'rate'));
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

