<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CatatanExport;
class AdminCatatanController extends Controller
{
public function index(Request $request)
{
    $users = User::all();

    // FILTER default = bulan ini
    $bulan = now()->format('m'); // contoh: 07
    $tahun = now()->format('Y'); // contoh: 2025

    $catatans = Catatan::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->latest()
                ->get();

    return view('admin.catatans.index', compact('catatans', 'users', 'bulan', 'tahun'));
}


public function create()
{
return view('admin.catatans.create');
}

public function store(Request $request)
{
$request->validate([
'title' => 'required|string|max:255',
'description' => 'required|string',
'image' => 'nullable|image|max:2048',
// 'name' => 'nullable|string|max:100',
'target' => 'required|string',
'kendala' => 'required|string',
'solusi' => 'required|string',

]);

$imagePath = null;
if ($request->hasFile('image')) {
$imagePath = $request->file('image')->store('catatan_images', 'public');
}

Catatan::create([
'title' => $request->title,
'description' => $request->description,
'image' => $imagePath,
'user_id' => auth()->id(),
// 'name' => $request->name ?? auth()->user()->name,
'target' => $request->target,
'kendala' => $request->kendala,
'solusi' => $request->solusi,
]);

return redirect()->route('admin.catatans.index')->with('success', 'Catatan berhasil ditambahkan');
}

public function edit(Catatan $catatan)
{
return view('admin.catatans.edit', compact('catatan'));
}

public function update(Request $request, Catatan $catatan)
{
$request->validate([
'title' => 'required|string|max:255',
'description' => 'required|string',
'image' => 'nullable|image|max:2048',
// 'name' => 'nullable|string|max:100',
'target' => 'nullable|string',
'kendala' => 'nullable|string',
'solusi' => 'nullable|string',

]);

$imagePath = $catatan->image;
if ($request->hasFile('image')) {
$imagePath = $request->file('image')->store('catatan_images', 'public');
}

$catatan->update([
'title' => $request->title,
'description' => $request->description,
'image' => $imagePath,
// 'name' => $request->name ?? $catatan->name,
'target' => $request->target,
'kendala' => $request->kendala,
'solusi' => $request->solusi,
]);

return redirect()->route('admin.catatans.index')->with('success', 'Catatan berhasil diperbarui');
}

public function destroy(Catatan $catatan)
{
$catatan->delete();
return redirect()->route('admin.catatans.index')->with('success', 'Catatan berhasil dihapus');
}
    public function exportPDF()
    {
        $catatans = Catatan::all();
        $pdf = Pdf::loadView('admin.catatans.pdf', compact('catatans'));
        $pdf->setPaper('A4','landscape');

        return $pdf->download('laporan_catatan.pdf');
    }


    public function exportPerBulan(Request $request)
{
    $month = $request->input('month');
    $year = $request->input('year');

    $catatans = Catatan::whereMonth('created_at', $month)
                        ->whereYear('created_at', $year)
                        ->get();

    $catatans = $this->toUtf8($catatans);

    $pdf = Pdf::loadView('admin.catatans.export', compact('catatans', 'month', 'year'));
    $pdf->setPaper('A4','landscape');

    return $pdf->download("catatan_{$month}_{$year}.pdf");
}



public function exportPerUser(Request $request)
{
    $id = $request->user_id ?? auth()->id();
    $user = User::findOrFail($id);

    $catatans = Catatan::where('user_id', $user->id)->get();

    if ($catatans->isEmpty()) {
        return redirect()->route('admin.catatans.index')->with('error', 'Data tidak ditemukan.');
    }

    // Konversi data ke UTF-8 untuk menghindari error encoding
    $catatans = $this->toUtf8($catatans);
    $user = $this->toUtf8($user);

    $pdf = Pdf::loadView('admin.catatans.export_user', compact('catatans', 'user'));
    $pdf->setPaper('A4', 'landscape');

    return $pdf->download("catatan_{$user->name}.pdf");
}

public function exportPerUserPerBulan(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'month' => 'required|numeric|min:1|max:12',
        'year' => 'required|numeric|min:2000|max:' . now()->year,
    ]);

    $user = User::findOrFail($request->user_id);
    $month = $request->month;
    $year = $request->year;

    $catatans = Catatan::where('user_id', $user->id)
                        ->whereMonth('created_at', $month)
                        ->whereYear('created_at', $year)
                        ->get();

    if ($catatans->isEmpty()) {
        return redirect()->route('admin.catatans.index')->with('error', 'Data tidak ditemukan.');
    }

    $catatans = $this->toUtf8($catatans);
    $user = $this->toUtf8($user);

    $pdf = Pdf::loadView('admin.catatans.export_user_per_bulan', compact('catatans', 'user', 'month', 'year'));
    $pdf->setPaper('A4', 'landscape');

    return $pdf->download("catatan_{$user->name}_{$month}_{$year}.pdf");
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
    $catatans = Catatan::all();

    $catatans = $this->toUtf8(($catatans));
         
    return Excel::download(new CatatanExport($catatans), 'catatan.xlsx');
}



}
