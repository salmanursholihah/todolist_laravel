<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function show()
   {
    return view ('profile', compact('user'));
   }
   

   public function update(Request $request)
   {
    $user = Auth::user();

    $validated =$request ->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user->namae = $validated['name'];
    $user->email = $validated['email'];

    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }
    ($request->hasFile('avatar')){
        if($user->avatar && Storage::exits('public/avarats/' . $user->avatar)){
            Storage::delete('public/avatars/' . $user->avatar);
        }

        $file = $request->file('avatar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/avatars', $filename);
        $user->avatar = $filename;
    }

    $user->save();
    return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
   }
}
