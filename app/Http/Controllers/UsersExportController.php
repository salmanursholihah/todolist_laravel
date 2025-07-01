<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class UsersExportController extends Controller

{
    public function exportExcel()
    {
        return Excel::download(new UserExport, 'laporan_user.xlsx');
    }

    public function exportPDF()
    {
        $users = user::all();
        $pdf = Pdf::loadView('admin.users.pdf', compact('users'));
        return $pdf->download('laporan_users.pdf');
    }
}