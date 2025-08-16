<?php
use App\Http\Controllers\TestMidtransController;
use Illuminate\Support\Facades\Log;
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
use App\Http\Controllers\PencapaianBulananController;
use App\Http\Controllers\TasksExportController;
use App\Http\Controllers\UsersExportController;
use App\Http\Controllers\MonthlyReportController;
use App\Http\Controllers\TestCatatanController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\AdminLemburController;
use App\Http\Controllers\VoiceNoteController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\TestMiddtransController;
use App\Http\Controllers\DashboardController;
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
// Route::middleware('auth')->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



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
    return view('home');
});
//routing export document
Route::get('/keuangan/export/excel', [KeuanganExportController::class, 'exportExcel'])->name('keuangan.export.excel');
Route::get('/keuangan/export/pdf', [KeuanganExportController::class, 'exportPDF'])->name('keuangan.export.pdf');

//routing export document
Route::get('/catatan/export/excel', [AdminCatatanController::class, 'exportExcel'])->name('catatan.export.excel');
Route::get('/catatan/export/pdf', [AdminCatatanController::class, 'exportPDF'])->name('catatan.export.pdf');
Route::post('/export-catatan', [AdminCatatanController::class, 'exportPerBulan' ])->name('export.perbulan');
Route::post('export-catatan-peruser', [AdminCatatanController::class, 'exportPerUser'])->name('export.peruser');




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

// //rekap pencapaian bulanan
// Route::get('/pencapaian_bulanan', [PencapaianBulananController::class, 'index'])->name('admin.pencapaians.index');
// Route::post('/pencapaian_bulanan', [PencapaianBulananController::class, 'store'])->name('admin.pencapaians.store');


///report
Route::get('/monthly-report', [MonthlyReportController::class, 'index'])->name('monthly.report.index');
Route::post('/monthly-report', [MonthlyReportController::class, 'store'])->name('monthly.report.store');



//route
Route::middleware(['auth', 'CheckRole:user'])->group(function(){
   Route::get('/test/catatan', [TestCatatanController::class, 'index'])->name('test.catatans.index'); 
   Route::post('/test/catatan', [TestCatatanController::class, 'store'])->name('test.catatans.store');
});


///chat admin routes
Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::get('admin/chat', [MessageController::class, 'indexAdmin'])->name('admin.chat.index');
    Route::get('admin/chat/{receiverId}', [MessageController::class, 'chatWithAdmin'])->name('admin.chat.show');
    Route::post('admin/chat/send', [MessageController::class, 'send'])->name('admin.chat.send');
});

//chat user routes
Route::middleware(['auth'])->group(function () {
    Route::get('chat', [MessageController::class, 'indexUser'])->name(name: 'chat.index');
    Route::get('chat/{receiverId}', [MessageController::class, 'chatWithUser'])->name('chat.show');
    Route::post('chat/send', [MessageController::class, 'send'])->name('chat.send');
    Route::get('chat/voice', [MessageController::class, 'storevoice'])->name('chat.voice');

});


Route::middleware(['auth'])->group(function(){
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('admin')->middleware(['auth', 'CheckRole:admin'])->group(function(){
    Route::get('profile', [ProfileController::class, 'showadmin'])->name('admin.profile.show');
    Route::put('profile', [ProfileController::class, 'updateadmin'])->name('admin.profile.update');
});





///admin export catatan pdf

Route::get('/export-excel', [AdminCatatanController::class, 'exportExcel']);
Route::get('/export-catatan', [CatatanExportController::class, 'exportPerUser'])->name('catatan.export.pdf');



//lembur
Route::middleware(['auth'])->group(function () {
    Route::get('/lembur', [LemburController::class, 'index'])->name('lembur.index');
    Route::get('/lembur/create', [LemburController::class, 'create'])->name('lembur.create');
    Route::post('/lembur', [LemburController::class, 'store'])->name('lembur.store');
    Route::put('/lembur/{id}/status', [LemburController::class, 'updateStatus'])->name('lembur.updateStatus');
});


//admin lembur
Route::middleware(['auth', 'CheckRole:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/lembur', [AdminLemburController::class, 'index'])->name('lembur.index');
    Route::post('/lembur/{id}/approve', [AdminLemburController::class, 'approve'])->name('lembur.approve');
    Route::post('/lembur/{id}/reject', [AdminLemburController::class, 'reject'])->name('lembur.reject');
    Route::get('lembur/bonus', [AdminLemburController::class, 'showBonus'])->name('lembur.bonus');
    Route::put('setting/lembur', [AdminLemburController::class, 'updateLembur'])->name('setting.lembur.update');

});

///download laporan lembur
Route::post('/export-lembur', [AdminLemburController::class, 'exportPerBulan' ])->name('export.perbulan');
Route::post('export-lembur-peruser', [AdminLemburController::class, 'exportPerUser'])->name('admin.lembur.export_puser');


///voice note
Route::post('/voice-note/upload', [VoiceNoteController::class, 'upload']);


///absensi kamera
Route::middleware(['auth'])->group(function(){
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
});



///halaman lembur interaktif
// Route::get('/lembur-interaktif', function () {
//     return view('lembur');
// })->middleware('auth')->name('lembur');  



//halaman kontak
// tampilkan halaman kontak (GET)
Route::get('/kontak', function() {
    return view('kontak');
})->name('kontak');

// proses form kontak (POST)
Route::post('/kontak', function(Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'pesan' => 'required',
    ]);
    
    // proses kirim email / simpan log
    Log::info('Pesan kontak:', $validated);

    return back()->with('success', 'Pesan Anda berhasil dikirim.');
})->name('kontak.kirim');

///blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


//halaman panduan
Route::get('/panduan', function (){
    return view('panduan');
});



// //payment
// Route::middleware(['auth'])->group(function(){
// Route::get('/langganan', [PaymentController::class, 'paket'])->name('langganan.index');
// Route::post('/bayar', [PaymentController::class, 'pay'])->name('bayar');
// Route::post('/midtrans/callback', [PaymentController::class, 'midtransCallback'])->name('midtrans.callback');
// Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
// });



// //subscriptions
// Route::middleware(['auth'])->group(function () {
//     Route::get('/plans', [SubscriptionsController::class, 'showPlans'])->name('plans');
//     Route::post('/subscribe', [SubscriptionsController::class, 'subscribe'])->name('subscribe');
// });
// ///midtrans
// Route::post('/midtrans/callback', [SubscriptionsController::class, 'callback'])->name('midtrans.callback');




Route::middleware(['auth'])->group(function() {
    Route::get('/plans', [PlanController::class,'index'])->name('plans.index');
    Route::post('/checkout', [PaymentController::class,'checkout'])->name('checkout');
    
});

// Midtrans notification (no csrf)
Route::post('/midtrans/notification', [MidtransController::class,'notificationHandler'])->name('midtrans.notification');




///midtrans
// Route::middleware(['auth'])->group(function() {
//     Route::get('/subscription/select-plan', [SubscriptionsController::class, 'selectPlan'])->name('subscription.selectPlan');
//     Route::post('/subscription/select-plan', [SubscriptionsController::class, 'postSelectPlan']);

//     Route::get('/subscription/step/{step}', [SubscriptionsController::class, 'showStep'])->name('subscription.step');
//     Route::post('/subscription/step/{step}', [SubscriptionsController::class, 'postStep']);

//     Route::get('/subscription/checkout', [SubscriptionsController::class, 'checkout'])->name('subscription.checkout');
//     Route::post('/subscription/payment', [SubscriptionsController::class, 'processPayment'])->name('subscription.payment');
// });

// // Midtrans callback (POST)
// Route::post('/midtrans/callback', [MidtransController::class, 'callback']);



// //menghubungkan fitur absensi dengan fitur langganan 
// Route::middleware(['auth', 'check.subscription'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });



// Langganan
Route::middleware(['auth'])->group(function() {
    Route::get('/subscription/select-plan', [SubscriptionsController::class, 'selectPlan'])->name('subscription.selectPlan');
    Route::post('/subscription/select-plan', [SubscriptionsController::class, 'postSelectPlan']);
    Route::get('/subscription/step/{step}', [SubscriptionsController::class, 'showStep'])->name('subscription.step');
    Route::post('/subscription/step/{step}', [SubscriptionsController::class, 'postStep']);
    Route::get('/subscription/checkout', [SubscriptionsController::class, 'checkout'])->name('subscription.checkout');
    Route::post('/subscription/payment', [SubscriptionsController::class, 'processPayment'])->name('subscription.payment');
});

// Midtrans callback
Route::post('/midtrans/callback', [MidtransController::class, 'callback']);

// Dashboard absensi hanya untuk user berlangganan aktif
Route::middleware(['auth', 'check.subscription'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});





// ///menghubungkan absensi dengan fitur belum berhasil
// Route::middleware(['auth', 'subscribed'])->group(function () {
//     Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
//     Route::post('/absensi/masuk', [AbsensiController::class, 'masuk'])->name('absensi.masuk');
// });
