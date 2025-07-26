<?php

namespace App\Exports;

use app\Models\Catatan;
use Maatwebsite\Excel\Concerns\FromCollection;

class CatatanExport implements FromCollection
{

    public function collection()
    {
        return Catatan::all([
            'id',
            'title',
            'description',
            'created_at',
            'updated_at',
            'kendala',
            'solusi',
            'target',
            'user_id',
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Judul',
            'Deskripsi',
            'Tanggal Input',
            'Kendala',
            'Solusi',
            'Target',
            'ID User',
        ];
    }
}
