<?php

namespace App\Http\Controllers;


use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
public function index()
{
$data = Keuangan::orderBy('date', 'desc')->get();

$total_masuk = $data->where('type', 'masuk')->sum('amount');
$total_keluar = $data->where('type', 'keluar')->sum('amount');
$saldo = $total_masuk - $total_keluar;

return view('keuangan.index', compact('data', 'total_masuk', 'total_keluar', 'saldo'));
}

public function store(Request $request)
{
$request->validate([
'date' => 'required|date',
'deskripsi' => 'required|string',
'type' => 'required|in:masuk,keluar',
'amount' => 'required|integer'
]);

Keuangan::create($request->all());

return redirect()->route('keuangan.index')->with('success','transaksi berhasil di tambahkan');
}
}