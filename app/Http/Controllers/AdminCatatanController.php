<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;

class AdminCatatanController extends Controller
{
public function index()
{
$catatans = Catatan::latest('images')->get(); // Semua catatan dari semua user
return view('admin.catatans.index', compact('catatans'));
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
]);

return redirect()->route('admin.catatans.index')->with('success', 'Catatan berhasil diperbarui');
}

public function destroy(Catatan $catatan)
{
$catatan->delete();
return redirect()->route('admin.catatans.index')->with('success', 'Catatan berhasil dihapus');
}
}