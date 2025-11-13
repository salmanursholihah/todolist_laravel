<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Catatan Users {{ htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') }}</title>
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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7858281078425614"
     crossorigin="anonymous"></script>
</head>
<body>
    <h2>Laporan Catatan Users {{ htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') }}</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Target</th>
                <th>Kendala</th>
                <th>Solusi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catatans as $catatan)
            <tr>
                <td>{{ $catatan->user_id }}</td>
                <td>{{ htmlspecialchars($catatan->user->name ?? 'username tidak ditemukan', ENT_QUOTES, 'UTF-8') }}</td>
                <td>{{ htmlspecialchars($catatan->title, ENT_QUOTES, 'UTF-8') }}</td>
                <td>{{ htmlspecialchars($catatan->description, ENT_QUOTES, 'UTF-8') }}</td>
                <td>{{ htmlspecialchars($catatan->target, ENT_QUOTES, 'UTF-8') }}</td>
                <td>{{ htmlspecialchars($catatan->kendala, ENT_QUOTES, 'UTF-8') }}</td>
                <td>{{ htmlspecialchars($catatan->solusi, ENT_QUOTES, 'UTF-8') }}</td>
                <td>{{ $catatan->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>





