<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ads = Ad::where('is_active', 1)
        ->where('start_at', '<=', now())
        ->where('end_at', '>=', now())
        ->get()
        ->groupBy('placement');


        return view('home', compact('ads'));
    }
}
