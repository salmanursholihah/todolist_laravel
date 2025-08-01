<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use FFMpeg;

class VoiceNoteController extends Controller
{
 public function upload(Request $request)
    {
        $request->validate([
            'voice_note' => 'required|file|mimetypes:audio/webm,audio/ogg,audio/wav|max:20480', // max 20MB
        ]);

        $file = $request->file('voice_note');

        // Simpan file WebM dulu ke storage/temp
        $tempPath = $file->store('temp');

        $filenameWithoutExt = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $mp3Filename = $filenameWithoutExt . '.mp3';

        // Pastikan folder voice_notes ada di storage/app/public
        Storage::makeDirectory('public/voice_notes');

        $tempFullPath = storage_path('app/' . $tempPath);
        $mp3FullPath = storage_path('app/public/voice_notes/' . $mp3Filename);

        // Konversi WebM ke MP3 pakai FFmpeg (pastikan ffmpeg sudah terinstal di server)
        try {
            // Pakai package "php-ffmpeg/php-ffmpeg" atau panggil exec langsung:
            exec("ffmpeg -i " . escapeshellarg($tempFullPath) . " -vn -ar 44100 -ac 2 -b:a 192k " . escapeshellarg($mp3FullPath));

            // Hapus file temp WebM
            Storage::delete($tempPath);

            // Simpan info ke database, contoh:
            // Message::create(['voice_note' => 'voice_notes/'.$mp3Filename, ...]);

            Log::info("Voice note berhasil disimpan sebagai MP3: " . $mp3Filename);

            return response()->json(['status' => 'success', 'file' => $mp3Filename]);

        } catch (\Exception $e) {
            Log::error('Gagal convert voice note: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Gagal convert voice note'], 500);
        }
    }
}


