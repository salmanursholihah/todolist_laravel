<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad; // Assuming you have an Ad model for ads
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class BackendAdController extends Controller
{
 public function index()
    {
        $ads = Ad::latest()->paginate(10);
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'type'       => 'required|in:image,video,audio,popup',
            'placement'  => 'nullable|string|max:255',
            'media_path' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mp3|max:51200',
            'link_url'   => 'nullable|url',
            'duration'   => 'nullable|integer',
            'weight'     => 'nullable|integer',
            'autoplay'   => 'boolean',
            'mute'       => 'boolean',
            'is_active'  => 'boolean',
            'start_at'   => 'nullable|date',
            'end_at'     => 'nullable|date|after_or_equal:start_at',
            'meta'       => 'nullable|array',
        ]);

        if ($request->hasFile('media_path')) {
            $validated['media_path'] = $request->file('media_path')->store('ads', 'public');
        }

        Ad::create($validated);

        return redirect()->route('admin.ads.index')->with('success', 'Iklan berhasil ditambahkan.');
    }

    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'type'       => 'required|in:image,video,audio,popup',
            'placement'  => 'nullable|string|max:255',
            'media_path' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mp3|max:51200',
            'link_url'   => 'nullable|url',
            'duration'   => 'nullable|integer',
            'weight'     => 'nullable|integer',
            'autoplay'   => 'boolean',
            'mute'       => 'boolean',
            'is_active'  => 'boolean',
            'start_at'   => 'nullable|date',
            'end_at'     => 'nullable|date|after_or_equal:start_at',
            'meta'       => 'nullable|array',
        ]);

        if ($request->hasFile('media_path')) {
            if ($ad->media_path) {
                Storage::disk('public')->delete($ad->media_path);
            }
            $validated['media_path'] = $request->file('media_path')->store('ads', 'public');
        }

        $ad->update($validated);

        return redirect()->route('admin.ads.index')->with('success', 'Iklan berhasil diperbarui.');
    }

    public function destroy(Ad $ad)
    {
        if ($ad->media_path) {
            Storage::disk('public')->delete($ad->media_path);
        }
        $ad->delete();

        return redirect()->route('admin.ads.index')->with('success', 'Iklan berhasil dihapus.');
    }
}


