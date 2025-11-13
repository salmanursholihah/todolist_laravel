<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Lembur User {{ $user->name ?? 'Nama tidak ditemukan' }}</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7858281078425614"
     crossorigin="anonymous"></script>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <h2>Laporan Lembur User {{ $user->name ?? 'Tidak diketahui' }}</h2>

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
        </thead>
        <tbody>
            @foreach($lemburs as $lembur)
            <tr>
                <td>{{ $lembur->user_id }}</td>
                <td>{{ $lembur->user->name ?? 'User tidak ditemukan' }}</td>
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
