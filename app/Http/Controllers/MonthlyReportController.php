<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan; // Model catatan harian
use App\Models\MonthlyReport; // Model rekap bulanan
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MonthlyReportController extends Controller
{
public function index(Request $request)
{
$userId = Auth::id();
$month = $request->month ?? now()->month;
$year = $request->year ?? now()->year;

// Ambil catatan harian bulan ini
$dailyNotes = Catatan::where('user_id', $userId)
->whereMonth('created_at', $month)
->whereYear('created_at', $year)
->get();

// Contoh: total catatan & total kata di description
$totalNotes = $dailyNotes->count();
$totalWords = $dailyNotes->sum(fn($note) => str_word_count($note->description));

// Ambil atau buat data ringkasan user
$monthlyReport = MonthlyReport::firstOrCreate(
[
'user_id' => $userId,
'month' => $month,
'year' => $year,
],
[
'summary' => null,
]
);

return view('monthly_report.index', compact(
'dailyNotes',
'totalNotes',
'totalWords',
'monthlyReport',
'month',
'year'
));
}

public function store(Request $request)
{
$request->validate([
'summary' => 'nullable|string',
'month' => 'required|integer',
'year' => 'required|integer',
]);

MonthlyReport::updateOrCreate(
[
'user_id' => Auth::id(),
'month' => $request->month,
'year' => $request->year,
],
[
'summary' => $request->summary,
]
);

return redirect()->route('monthly.report.index')
->with('success', 'Ringkasan Bulanan Tersimpan!');
}
}