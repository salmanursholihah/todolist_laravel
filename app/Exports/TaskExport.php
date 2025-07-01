<?php

namespace App\Exports;

use app\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;

class TaskExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Task::all();
    }
}