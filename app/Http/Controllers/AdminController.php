<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Task;
use App\Models\Keuangan;
use App\Models\Catatan; 

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index(){


    $users = User::where('role', 'user')->get();
    $catatans = Catatan::with('user')->get();
    $tasks = Task::with('user')->get(); 
    $keuangans = Keuangan::with('user')->get();

    return view('admin.dashboard', compact('users', 'catatans', 'tasks', 'keuangans'));

    // $task =Task::count();
    // $user = User::count();
    // $keuangan = Keuangan::count();
    
    // return view('admin.dashboard', compact('tasks','users','keuangans'));
}
 public function UserManager(){
    // Ambil data user 
    $users = User::where('role', 'user')->get();

    return view('admin.users.index', compact('users'));
}

public function LaporanTask(){
    // Ambil data tasks 
    $tasks = Task::with('user')->orderBy('created_at','desc')->get();

    return view('admin.tasks.index', compact('tasks'));
}


public function LaporanCatatan()
{
    $catatans = Catatan::with('user')->orderBy('created_at', 'desc')->get();
    return view('admin.catatans.index', compact('catatans'));
}


public function LaporanKeuangan(){
    // Ambil data keuangan 
    $keuangans = Keuangan::with('user')->latest()->get();

    return view('admin.keuangans.index', compact('keuangans'));
}
}