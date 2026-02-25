<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;
use Illuminate\Support\Facades\Auth;

class CatatanController extends Controller
{
    public function index()
    {
        $today = now();
        $isEndOfMonth = $today->isSameDay($today->endOfMonth());

        // Ambil hanya catatan bulan ini
        $catatans = Auth::user()
            ->catatans()
            ->where('periode', $today->format('Y-m'))
            ->get();

        // Sudah ada evaluasi bulanan?
        $hasMonthly = Auth::user()
            ->catatans()
            ->where('periode', $today->format('Y-m'))
            ->whereNotNull('kendala')
            ->exists();

        $showMonthlyForm = $isEndOfMonth && !$hasMonthly;

        return view('catatan', compact('catatans', 'showMonthlyForm'));
    }

public function store(Request $request)
{
    $today   = now()->toDateString();
    $userId  = auth()->id();

    if (!$userId) {
        return redirect()->back()->withErrors('Anda harus login untuk membuat catatan.');
    }

    $alreadyExists = Catatan::where('user_id', $userId)
        ->whereDate('created_at', $today)
        ->exists();

    if ($alreadyExists) {
        return redirect()->back()->withErrors('Kamu sudah membuat catatan hari ini.');
    }

    $request->validate([
        'title'       => 'required|string',
        'description' => 'required|string',
        'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'kendala'     => 'nullable|string',
        'solusi'      => 'nullable|string',
        'target'      => 'nullable|string',
    ]);

    $catatan = Catatan::create([
        'title'       => $request->title,
        'description' => $request->description,
        'user_id'     => $userId,
        'kendala'     => $request->kendala,
        'solusi'      => $request->solusi,
        'target'      => $request->target,
        'periode'     => now()->format('Y-m'),
    ]);

    // Simpan gambar
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);

            $catatan->images()->create([
                'image_path' => 'uploads/' . $filename,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Catatan berhasil ditambahkan!');
}

    public function destroy(Catatan $catatan)
    {
        $catatan->delete();
        return redirect()->back();
    }
}
