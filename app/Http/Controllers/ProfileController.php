<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }


    public function showadmin()
    {
        $user = Auth::user();
        return view ('admin.profile', compact('user'));
    }

    // public function update(Request $request)
    // {
    //     $user = Auth::user();

    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:8|confirmed',
    //         'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $user->name = $validated['name'];
    //     $user->email = $validated['email'];

    //     if (!empty($validated['password'])) {
    //         $user->password = Hash::make($validated['password']);
    //     }

    //     if ($request->hasFile('avatar')) {
    //         if ($user->avatar && Storage::exists('storage/avatars/' . $user->avatar)) {
    //             Storage::delete('storage/avatars/' . $user->avatar);
    //         }

    //         $file = $request->file('avatar');
    //         $filename = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('storage/avatars/'), $filename);
    //         $user->avatar = $filename;

    //     }

    //     $user->save();
    //     return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    // }


    public function update(Request $request)
{
    return $this->updateProfile($request, false);
}

public function updateadmin(Request $request)
{
    return $this->updateProfile($request, true);
}

private function updateProfile(Request $request, $isAdmin = false)
{
    $user = Auth::user();

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];

    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    if ($request->hasFile('avatar')) {
        if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
            Storage::delete('public/avatars/' . $user->avatar);
        }

        $file = $request->file('avatar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/avatars', $filename);
        $user->avatar = $filename;
    }

    $user->save();

    return redirect()->route($isAdmin ? 'admin.profile.show' : 'profile.show')
        ->with('success', 'Profile updated successfully.');
}

}
