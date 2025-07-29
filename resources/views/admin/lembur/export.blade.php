<!DOCTYPE html>
<html>

<head>
    <title>Laporan lembur Users {{ $month }}/{{ $year }}</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }
    body {
         font-family: DejaVu Sans, sans-serif;
    
    }
    </style>
</head>

<body>
    <h2>Laporan lembur Users {{ $month }}/ {{ $year }}</h2>
    <table>
        <thead>

            <tr>
                 <th>User ID</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Alasan</th>
                <th>Bukti</th>
            </tr>
            @foreach($lemburs as $lembur)
            <tr>
                <td>{{ $lembur->user_id }}</td>
             <td>{{ $lembur->user->name }}</td>
                <td>{{ $lembur->tanggal }}</td>
                <td>{{ $lembur->jam_mulai }} - {{ $lembur->jam_selesai }}</td>
                <td>{{ $lembur->alasan }}</td>
                  <td>
                    @if ($lembur->bukti)
                        <a href="{{ asset('storage/' . $lembur->bukti) }}" target="_blank">Lihat Bukti</a>
                    @else
                        Tidak Ada
                    @endif
                </td>

            </tr>
            @endforeach

            </tbody>
    </table>
</body>

</html>