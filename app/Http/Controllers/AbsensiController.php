<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    public function index()
    // {
    //     $absen = Absensi::where('user_id', Auth::id())
    //                     ->whereDate('created_at', now()->toDateString())
    //                     ->first();

    //     return view('absensi.index', compact('absen'));
    // }

{
    if(!auth()->user()->isSubscribed()){
        return redirect()->route('subscription.index')
                         ->with('error', 'Anda harus berlangganan untuk mengakses fitur ini.');
    }

    $absensi = Absensi::where('user_id', auth()->id())->get();
    return view('absensi.index', compact('absensi'));
}


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $imagePath = $request->file('image')->store('absensi', 'public');

        $absen = Absensi::where('user_id', Auth::id())
                        ->whereDate('created_at', now()->toDateString())
                        ->first();

        if (!$absen) {
            // Absen masuk
            Absensi::create([
                'user_id' => Auth::id(),
                'image_masuk' => $imagePath,
                'waktu_masuk' => now(),
            ]);
            return back()->with('success', 'Absen masuk berhasil');
        } elseif (!$absen->waktu_pulang) {
            // Absen pulang
            $absen->update([
                'image_pulang' => $imagePath,
                'waktu_pulang' => now(),
            ]);
            return back()->with('success', 'Absen pulang berhasil');
        } else {
            return back()->with('error', 'Anda sudah absen masuk dan pulang hari ini');
        }
    }
}


