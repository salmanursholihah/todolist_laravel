<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontak'); // sesuaikan nama file blade kamu
    }

    public function kirim(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // Simpan ke log (sementara)
        Log::info('Pesan Kontak:', [
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan
        ]);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
