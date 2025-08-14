<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdUploadController extends Controller
{
    /**
     * Handle the ad upload request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        // Handle the ad upload logic here
        // --- IGNORE ---
    }public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4,webm',
        ]);

        $path = $request->file('file')->store('ads', 'public');

        return response()->json([
            'media_path' => $path,
            'url' => asset('storage/' .$path),
        ]);
    }
}
