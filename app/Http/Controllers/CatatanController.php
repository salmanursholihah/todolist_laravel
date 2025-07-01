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
        'title' => 'required|string',
        'description' => 'nullable|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $catatan = Catatan::create([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => auth()->id(),
    ]);

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


public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
    ]);

    $catatan = Catatan::findOrFail($id);
    $catatan->judul = $request->judul;
    $catatan->isi = $request->isi;
    $catatan->save();

    return redirect()->route('catatan.index')->with('success', 'Catatan berhasil diperbarui.');
}

public function destroy (Catatan $catatan){
$catatan ->delete();
return redirect()->back();

}
}