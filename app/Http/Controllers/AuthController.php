<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
   
   
       public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(request $request){
        $validate= $request->validate([
          'name'=>'required|string|max:225',
          'email'=> 'required|email|unique:users,email',
          'password'=>'required|string|min:6|confirmed', 
        ]);

        $user =\App\Models\User::create([
            'name'=>$validate['name'],
            'email'=>$validate['email'],
            'password'=>bcrypt($validate['password']),
            'role'=>'user',
        ]);
        Auth::login($user);
        return redirect('/login');
    } 

  public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended('/dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function store(Request $request): RedirectResponse
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended('/dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}


     public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
             return redirect('/login')->with('sukses','berhasil logout');

     
            }


            public function post(){
                return view('auth.post');
            }

                public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete(); // soft delete
    return redirect()->route('users.index')->with('success', 'User dinonaktifkan.');
}

            }

    