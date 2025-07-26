<?php

namespace App\Exports;

use App\Models\Catatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CatatanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Catatan::select([
            'id',
            'title',
            'description',
            'created_at',
            'updated_at',
            'kendala',
            'solusi',
            'target',
            'user_id',
        ])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Judul',
            'Deskripsi',
            'Tanggal Input',
            'Tanggal Update',
            'Kendala',
            'Solusi',
            'Target',
            'ID User',
        ];
    }
}
