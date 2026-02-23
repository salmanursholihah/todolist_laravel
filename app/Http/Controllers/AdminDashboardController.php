<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
   public function index()
{
    return view('admin.dashboard', [
        'totalUsers' => \App\Models\User::count(),
        'totalCatatan' => \App\Models\Catatan::count(),
        'totalKeuangan' => \App\Models\Keuangan::sum('jumlah'),
        'totalTask' => \App\Models\Task::count(),
        'recentActivities' => \App\Models\Activity::latest()->take(5)->get(),
    ]);
}
}
