<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public function index() {
$users = User::all();
return view('admin.users.index', compact('users'));
}

public function create() {
return view('admin.users.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('users.index')->with('success', 'User berhasil dibuat');
}


public function edit(User $user) {
return view('admin.users.edit', compact('user'));
}

public function update(Request $request, User $user) {
$request->validate([
'name' => 'required',
'email' => 'required|email|unique:users,email,' . $user->id,
'role' => 'required'
]);

$user->update([
'name' => $request->name,
'email' => $request->email,
'role' => $request->role,
]);

return redirect()->route('admin.users.index')->with('success', 'User berhasil diubah');
}

public function destroy(User $user) {
$user->delete();
return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
}
}