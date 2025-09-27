<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __constructor()
    {
        $this->middleware(['auth', 'subscription']);
    }

  public function index()
{
    $today = now()->toDateString();
    $user = auth()->user();

    $hasCatatan = $user->catatans()->whereDate('created_at', $today)->exists();

    if (! $hasCatatan) {
        session()->flash('warning', '⚠️ Kamu belum mengisi catatan hari ini.');
    }

    return view('dashboard');
}

}
