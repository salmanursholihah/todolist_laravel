<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lembur;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function create()
{
    return view('lembur.create');
}

public function index()
{
    $lemburs = Lembur::where('user_id', auth()->id())->latest()->get();
    return view('lembur.index', compact('lemburs'));
}

public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required|after:mulai',
        'alasan' => 'required|string',
        'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
    ]);

    $fileName = null;
    if ($request->hasFile('bukti')) {
        $file = $request->file('bukti');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/bukti', $fileName);
    }

    Lembur::create([
        'user_id' => auth()->id(),
        'tanggal' => $request->tanggal,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'alasan' => $request->alasan,
        'bukti' => $fileName
    ]);

    return redirect()->route('lembur.index')->with('success', 'Lembur berhasil diajukan.');
}

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected','pending',
            'catatan' => 'nullable|string'
        ]);

        $lemburs = Lembur::findOrFail($id);
        $lemburs->status = $request->status;
        $lemburs->catatan = $request->catatan;
        $lemburs->save();

        return redirect()->back()->with('success', 'Status lembur diperbarui.');
    }

    
}

