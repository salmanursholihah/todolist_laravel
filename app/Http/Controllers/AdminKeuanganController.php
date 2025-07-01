<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKeuanganController extends Controller
{
    public function index()
    {
        $keuangans = Keuangan::with('user')->latest()->get();
        return view('admin.keuangans.index', compact('keuangans'));
    }

    public function create()
    {
        return view('admin.keuangans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'deskripsi' => 'required|string|max:255',
            'type' => 'required|in:masuk,keluar', // Validasi nilai type
            'amount' => 'required|numeric|min:0',
        ]);

        Keuangan::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'deskripsi' => $request->deskripsi,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.keuangans.index')->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    public function edit(Keuangan $keuangan)
    {
        return view('admin.keuangans.edit', compact('keuangan'));
    }

    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'date' => 'required|date',
            'deskripsi' => 'required|string|max:255',
            'type' => 'required|in:masuk,keluar',
            'amount' => 'required|numeric|min:0',
        ]);

        $keuangan->update([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'deskripsi' => $request->deskripsi,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.keuangans.index')->with('success', 'Data keuangan berhasil diperbarui.');
    }

    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect()->route('admin.keuangans.index')->with('success', 'Data keuangan berhasil dihapus.');
    }
}