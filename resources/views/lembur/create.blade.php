@extends ('layouts.app')

@section ('title', 'task')
@section ('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
    <h3>Form Pengajuan Lembur</h3>
    <form method="POST" action="{{ route('lembur.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waktu Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waktu Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alasan</label>
            <textarea name="alasan" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Upload Bukti (Opsional)</label>
            <input type="file" name="bukti" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>
    </form>
</div>


</body>
</html>
@endsection