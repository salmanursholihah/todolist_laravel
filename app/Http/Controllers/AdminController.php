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

        //ambil data user

        $users= user::all();

        //ambil data todolist

        $tasks = Task::all();

        //ambil data catatan

        $catatans = Catatan::all();

        //ambil data keuangan 

        $keuangans = Keuangan::all();

        
        return view ('admin.dashboard', compact ('users','catatans','tasks','keuangans'));
        $users = User::where('role', 'user')->get();
        $tasks = Task::whereHas('user', function ($query) {
        $query->where('role', 'user');
        })->get();

        
    }
    

 

}