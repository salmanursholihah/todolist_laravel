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
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCatatanController;
use App\Http\Controllers\AdminKeuanganController;
use App\Http\Controllers\KeuanganExportController;
use App\Http\Controllers\TaskExportController;
use App\Http\Controllers\CatatanExportController;
use App\Http\Controllers\TasksExportController;
use App\Http\Controllers\UsersExportController;

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
    Route::patch('/catatan/{catatan}', [CatatanController::class, 'update'])->name('catatan.update');
    Route::delete('/catatan/{catatan}', [CatatanController::class, 'destroy'])->name('catatan.destroy');
    // Route::get('/catatan/{id}/edit', [CatatanController::class, 'update'])->name('catatan.update');
// Route::put('/catatan/{id}', [CatatanController::class, 'update'])->name('catatan.update');



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



//keuangan user
Route::middleware(['auth'])->group(function (){
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
Route::post('/keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');
Route::patch('/keuangan/{keuangan}', [KeuanganController::class, 'update'])->name('keuangan.update');
Route::delete('/keuangan/{keuangan}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');
Route::get('/keuangan/{keuangan}', [KeuanganController::class, 'show'])->name('keuangan.show');

});


//index umum 
Route::get ('/',function(){
    return view('index');
});
//routing export document
Route::get('/keuangan/export/excel', [KeuanganExportController::class, 'exportExcel'])->name('keuangan.export.excel');
Route::get('/keuangan/export/pdf', [KeuanganExportController::class, 'exportPDF'])->name('keuangan.export.pdf');

//routing export document
Route::get('/catatan/export/excel', [CatatanExportController::class, 'exportExcel'])->name('catatan.export.excel');
Route::get('/catatan/export/pdf', [CatatanExportController::class, 'exportPDF'])->name('catatan.export.pdf');
Route::post('/export-catatan', [CatatanExportController::class, 'exportPerBulan' ])->name('export.perbulan');

//routing export document
Route::get('/tasks/export/excel', [TasksExportController::class, 'exportExcel'])->name('tasks.export.excel');
Route::get('/tasks/export/pdf', [TasksExportController::class, 'exportPDF'])->name('tasks.export.pdf');


//routing export document
Route::get('/users/export/excel', [UsersExportController::class, 'exportExcel'])->name('users.export.excel');
Route::get('/users/export/pdf', [UsersExportController::class, 'exportPDF'])->name('users.export.pdf');












// Admin Dashboard

Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::get('/admin/catatans/index', [AdminController::class, 'LaporanCatatan']);
    Route::get('/admin/users/index', [AdminController::class, 'UserManager']);
    Route::get('/admin/tasks/index', [AdminController::class, 'LaporanTask']);
    Route::get('/admin/keuangans/index', [AdminController::class, 'LaporanKeuangan']);
});

//admin user_management
Route::middleware(['auth', 'CheckRole:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});


///laporan catatan

Route::middleware(['auth', 'CheckRole:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('catatans', [AdminCatatanController::class, 'index'])->name('catatans.index');
    // Route::get('catatans/create', [AdminCatatanController::class, 'create'])->name('catatans.create');
    Route::post('catatans', [AdminCatatanController::class, 'store'])->name('catatans.store');
    Route::get('catatans/{catatan}/edit', [AdminCatatanController::class, 'edit'])->name('catatans.edit');
    Route::put('catatans/{catatan}', [AdminCatatanController::class, 'update'])->name('catatans.update');
    Route::delete('catatans/{catatan}', [AdminCatatanController::class, 'destroy'])->name('catatans.destroy');
});

//admin laporan_keuangan
Route::middleware(['auth', 'CheckRole:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('keuangans', [AdminKeuanganController::class, 'index'])->name('keuangans.index');
    // Route::get('keuangans/create', [AdminKeuanganController::class, 'create'])->name('keuangans.create');
    Route::post('keuangans', [AdminKeuanganController::class, 'store'])->name('keuangans.store');
    Route::get('keuangans/{keuangan}/edit', [AdminKeuanganController::class, 'edit'])->name('keuangans.edit');
    Route::put('keuangans/{keuangan}', [AdminKeuanganController::class, 'update'])->name('keuangans.update');
    Route::delete('keuangans/{keuangan}', [AdminKeuanganController::class, 'destroy'])->name('keuangans.destroy');
});