<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Lembur;

class LemburExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
     return Lembur::select([
        'id',
        'user_id',
        'name',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'alasan',
        'status',
        'catatan',
        'bukti' // Menambahkan kolom 'bukti'
     ])->get();  
    }
}
