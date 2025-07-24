<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;

class TestCatatanController extends Controller
{
public function index()
{
  // Cek apakah sekarang akhir bulan
  $today = now();
  $isEndOfMonth = $today->isSameDay($today->endOfMonth());

  // Cek: Sudah ada evaluasi bulan ini?
  $hasMonthly = Catatan::where('user_id', auth()->id())
    ->whereMonth('created_at', $today->month)
    ->whereNotNull('kendala')
    ->exists();

  $showMonthlyForm = $isEndOfMonth && !$hasMonthly;

  return view('test.catatans.index', compact('showMonthlyForm'));
}

public function store (Request $request)
{
    $validate = $request->validate([
         'title' => 'required|string',
        'description' => 'nullable|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'kendala' => 'nullable|string',
        'solusi' => 'nullable|string',
        'target' => 'nullable|string'
        
        
    ]);
    $validated['user_id'] = auth()->id();
    Catatan::create($validated);
    return redirect()->back()->with('success', 'berhasil di input');
    }
}