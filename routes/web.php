<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Login & Register
Route::get('/register',[AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Dashboard
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');


//reset password 
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

//routing catatan
Route::middleware(['auth'])->group(function () {
    Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan.index');
    Route::post('/catatan', [CatatanController::class, 'store'])->name('catatan.store');
    Route::patch('/catatan/{task}', [CatatanController::class, 'update'])->name('catatan.update');
    Route::delete('/catatan/{task}', [CatatanController::class, 'destroy'])->name('catatan.destroy');
});

//routing todolist
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

//calender page
Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/calendar/events', [CalendarController::class, 'getEvents']);

//post2
Route::get('/post', function(){
    return view ('auth.post');
});

Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
Route::post('/keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');



//index umum 
Route::get ('/',function(){
    return view('index');
});

// Admin Dashboard
Route::middleware(['auth', 'is_admin'])->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');