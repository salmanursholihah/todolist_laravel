<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Catatan - {{ $user->name }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f3f3f3;
        }
    </style>
</head>
<body>
    <h2>Laporan Catatan User: {{ $user->name }}</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Target</th>
                <th>Kendala</th>
                <th>Solusi</th>
                <th>Tanggal Input</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catatans as $catatan)
                <tr>
                    <td>{{ $catatan->user_id }}</td>
                    <td>{{ $catatan->user->name ?? '-' }}</td>
                    <td>{{ $catatan->title }}</td>
                    <td>{{ $catatan->description }}</td>
                    <td>{{ $catatan->target }}</td>
                    <td>{{ $catatan->kendala }}</td>
                    <td>{{ $catatan->solusi }}</td>
                    <td>{{ \Carbon\Carbon::parse($catatan->created_at)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
