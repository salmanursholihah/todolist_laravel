<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\excel\Concrons\C\FromCollection;

class ExportKeuangan extends Model
{
    use HasFactory;
     public function collection()
    {
        return Keuangan::select('tanggal', 'kategori', 'deskripsi', 'jumlah')->get();
    }

    public function headings(): array
    {
        return ['Tanggal', 'Kategori', 'Deskripsi', 'Jumlah'];
    }
}
