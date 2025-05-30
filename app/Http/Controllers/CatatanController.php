<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;
use Illuminate\Support\Facades\Auth;

class CatatanController extends Controller
{

public function index(){
    $catatans = Auth::user()->Catatans;
    return view ('catatan', compact('catatans'));
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $filename = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('laporan'), $filename); 
    }

    Catatan::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $filename,
        'user_id' => Auth::id(),
    ]);

    return redirect()->back()->with('success', 'Catatan berhasil ditambahkan!');
}

public function update(Catatan $catatan){
    $catatan->update();
    return redirect()->back();
}
public function destroy (Catatan $catatan){
$catatan ->delete();
return redirect()->back();

}

}