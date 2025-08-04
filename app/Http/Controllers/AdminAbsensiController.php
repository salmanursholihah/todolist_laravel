<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;    

class AdminAbsensiController extends Controller
{
    public function index( Request $request)
    {
        $query = Absensi::with('user')->latest();
     
        if($request->filled('tanggal')){
            $query->whereDate('created_at', $request->tanggal);
        }
        else{
            
        }
    }
}
