
@extends ('layouts.app')

@section ('title', 'user.lembur')
@section ('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container mt-4">
    <h3>Riwayat Pengajuan Lembur</h3>

   <div>
    <a href="{{ route('lembur.create') }}" class="btn btn-primary">Ajukan Lembur</a>
   </div>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Alasan</th>
                <th>Bukti</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lemburs as $l)
                <tr>
                    <td>{{ $l->tanggal }}</td>
                    <td>{{ $l->jam_mulai }} - {{ $l->jam_selesai }}</td>
                    <td>{{ $l->alasan }}</td>
                    <td>
                        @if ($l->bukti)
                        <a href="{{ asset('bukti_lembur/' . $l->bukti) }}" target="_blank">Lihat</a>                        
                        @else
                            Tidak Ada
                        @endif
                    </td>
                    <td>
                        @if ($l->status == 'panding')
                            <span class="badge bg-warning">Panding</span>
                        @elseif ($l->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                            <small><strong>Catatan:</strong>{{ $l->catatan }}</small>
                        @endif
                    </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
@endsection




