<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminTaskController extends Controller
{
// public function index()
// {
// $tasks = Task::all();
// return view('tasks.index', compact('tasks'));
// }

public function index()
{
    $tasks = Auth::user()->tasks;
    return view('tasks.index', compact('tasks'));
}

public function store(Request $request)
{
$request->validate(
    ['title' => 'required'
]);
    
Auth::user()->tasks()->create([
    'title' => $request->title
]);
return redirect()->back();
}


public function update(Task $task)
{
    if ($task->user_id !== Auth::id()) {
        abort(403); // Forbidden
    }

    $task->update(['is_done' => !$task->is_done]);
    return redirect()->back();
}

public function destroy(Task $task)
{
    if ($task->user_id !== Auth::id()) {
        abort(403);
    }

    $task->delete();
    return redirect()->back();
}
// public function verifikasi($id)
// {
//     $task = Task::findOrFail($id);
//     $task->status_verifikasi = true;
//     $task->save();

//     return redirect()->back()->with('success', 'task berhasil diverifikasi.');
// }



}