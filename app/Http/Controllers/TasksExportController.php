<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Exports\TaskExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;



class TasksExportController extends Controller
{
       public function exportExcel()
    {
        return Excel::download(new TaskExport, 'laporan_task.xlsx');
    }

    public function exportPDF()
    {
        $tasks = Task::all();
        $pdf = Pdf::loadView('admin.tasks.pdf', compact('tasks'));
        return $pdf->download('laporan_task.pdf');
    }

}