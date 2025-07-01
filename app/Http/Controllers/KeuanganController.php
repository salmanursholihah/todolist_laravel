<?php

namespace App\Http\Controllers;


use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
public function index()

{
    $user = Auth::user();
    $keuangans = Keuangan::where('user_id', $user->id)->get();
    return view ('keuangan.index', compact('keuangans'));
}
// {
// $data = Keuangan::orderBy('date', 'desc')->get();

// $total_masuk = $data->where('type', 'masuk')->sum('amount');
// $total_keluar = $data->where('type', 'keluar')->sum('amount');
// $saldo = $total_masuk - $total_keluar;

// return view('keuangan.index', compact('data', 'total_masuk', 'total_keluar', 'saldo'));
// }

public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'deskripsi' => 'required|string',
        'type' => 'required|in:masuk,keluar',
        'amount' => 'required|integer'
    ]);

    Keuangan::create([
        'user_id' => Auth::id(),
        'date' => $request->date,
        'deskripsi' => $request->deskripsi,
        'type' => $request->type,
        'amount' => $request->amount
    ]);

    return redirect()->route('keuangan.index')->with('success', 'Transaksi berhasil ditambahkan');
}

public function update(Request $request, $id)
{
    $data = Keuangan::findOrFail($id);
    $data->update($request->all());
    return redirect()->route('keuangan.index');
}

public function destroy($id)
{
    Keuangan::destroy($id);
    return redirect()->route('keuangan.index');
}
public function show($id)
{
    $keuangan = Keuangan::findOrFail($id);
    return view('keuangan.show', compact('keuangan'));
}
}